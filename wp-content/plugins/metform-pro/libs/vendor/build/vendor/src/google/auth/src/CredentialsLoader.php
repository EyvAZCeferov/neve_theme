<?php

/*
 * Copyright 2015 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace MetFormProVendor\Google\Auth;

use MetFormProVendor\Google\Auth\Credentials\InsecureCredentials;
use MetFormProVendor\Google\Auth\Credentials\ServiceAccountCredentials;
use MetFormProVendor\Google\Auth\Credentials\UserRefreshCredentials;
use MetFormProVendor\GuzzleHttp\ClientInterface;
/**
 * CredentialsLoader contains the behaviour used to locate and find default
 * credentials files on the file system.
 */
abstract class CredentialsLoader implements FetchAuthTokenInterface, UpdateMetadataInterface
{
    const TOKEN_CREDENTIAL_URI = 'https://oauth2.googleapis.com/token';
    const ENV_VAR = 'GOOGLE_APPLICATION_CREDENTIALS';
    const WELL_KNOWN_PATH = 'gcloud/application_default_credentials.json';
    const NON_WINDOWS_WELL_KNOWN_PATH_BASE = '.config';
    /**
     * @param string $cause
     * @return string
     */
    private static function unableToReadEnv($cause)
    {
        $msg = 'Unable to read the credential file specified by ';
        $msg .= ' GOOGLE_APPLICATION_CREDENTIALS: ';
        $msg .= $cause;
        return $msg;
    }
    /**
     * @return bool
     */
    private static function isOnWindows()
    {
        return \strtoupper(\substr(\PHP_OS, 0, 3)) === 'WIN';
    }
    /**
     * Returns the currently available major Guzzle version.
     *
     * @return int
     */
    private static function getGuzzleMajorVersion()
    {
        if (\defined('MetFormProVendor\\GuzzleHttp\\ClientInterface::MAJOR_VERSION')) {
            return ClientInterface::MAJOR_VERSION;
        }
        if (\defined('MetFormProVendor\\GuzzleHttp\\ClientInterface::VERSION')) {
            return (int) \substr(ClientInterface::VERSION, 0, 1);
        }
        throw new \Exception('Version not supported');
    }
    /**
     * Load a JSON key from the path specified in the environment.
     *
     * Load a JSON key from the path specified in the environment
     * variable GOOGLE_APPLICATION_CREDENTIALS. Return null if
     * GOOGLE_APPLICATION_CREDENTIALS is not specified.
     *
     * @return array|null JSON key | null
     */
    public static function fromEnv()
    {
        $path = \getenv(self::ENV_VAR);
        if (empty($path)) {
            return;
        }
        if (!\file_exists($path)) {
            $cause = 'file ' . $path . ' does not exist';
            throw new \DomainException(self::unableToReadEnv($cause));
        }
        $jsonKey = \file_get_contents($path);
        return \json_decode($jsonKey, \true);
    }
    /**
     * Load a JSON key from a well known path.
     *
     * The well known path is OS dependent:
     *
     * * windows: %APPDATA%/gcloud/application_default_credentials.json
     * * others: $HOME/.config/gcloud/application_default_credentials.json
     *
     * If the file does not exist, this returns null.
     *
     * @return array|null JSON key | null
     */
    public static function fromWellKnownFile()
    {
        $rootEnv = self::isOnWindows() ? 'APPDATA' : 'HOME';
        $path = [\getenv($rootEnv)];
        if (!self::isOnWindows()) {
            $path[] = self::NON_WINDOWS_WELL_KNOWN_PATH_BASE;
        }
        $path[] = self::WELL_KNOWN_PATH;
        $path = \implode(\DIRECTORY_SEPARATOR, $path);
        if (!\file_exists($path)) {
            return;
        }
        $jsonKey = \file_get_contents($path);
        return \json_decode($jsonKey, \true);
    }
    /**
     * Create a new Credentials instance.
     *
     * @param string|array $scope the scope of the access request, expressed
     *        either as an Array or as a space-delimited String.
     * @param array $jsonKey the JSON credentials.
     * @param string|array $defaultScope The default scope to use if no
     *   user-defined scopes exist, expressed either as an Array or as a
     *   space-delimited string.
     *
     * @return ServiceAccountCredentials|UserRefreshCredentials
     */
    public static function makeCredentials($scope, array $jsonKey, $defaultScope = null)
    {
        if (!\array_key_exists('type', $jsonKey)) {
            throw new \InvalidArgumentException('json key is missing the type field');
        }
        if ($jsonKey['type'] == 'service_account') {
            // Do not pass $defaultScope to ServiceAccountCredentials
            return new ServiceAccountCredentials($scope, $jsonKey);
        }
        if ($jsonKey['type'] == 'authorized_user') {
            $anyScope = $scope ?: $defaultScope;
            return new UserRefreshCredentials($anyScope, $jsonKey);
        }
        throw new \InvalidArgumentException('invalid value in the type field');
    }
    /**
     * Create an authorized HTTP Client from an instance of FetchAuthTokenInterface.
     *
     * @param FetchAuthTokenInterface $fetcher is used to fetch the auth token
     * @param array $httpClientOptions (optional) Array of request options to apply.
     * @param callable $httpHandler (optional) http client to fetch the token.
     * @param callable $tokenCallback (optional) function to be called when a new token is fetched.
     * @return \GuzzleHttp\Client
     */
    public static function makeHttpClient(FetchAuthTokenInterface $fetcher, array $httpClientOptions = [], callable $httpHandler = null, callable $tokenCallback = null)
    {
        if (self::getGuzzleMajorVersion() === 5) {
            $client = new \MetFormProVendor\GuzzleHttp\Client($httpClientOptions);
            $client->setDefaultOption('auth', 'google_auth');
            $subscriber = new Subscriber\AuthTokenSubscriber($fetcher, $httpHandler, $tokenCallback);
            $client->getEmitter()->attach($subscriber);
            return $client;
        }
        $middleware = new Middleware\AuthTokenMiddleware($fetcher, $httpHandler, $tokenCallback);
        $stack = \MetFormProVendor\GuzzleHttp\HandlerStack::create();
        $stack->push($middleware);
        return new \MetFormProVendor\GuzzleHttp\Client(['handler' => $stack, 'auth' => 'google_auth'] + $httpClientOptions);
    }
    /**
     * Create a new instance of InsecureCredentials.
     *
     * @return InsecureCredentials
     */
    public static function makeInsecureCredentials()
    {
        return new InsecureCredentials();
    }
    /**
     * export a callback function which updates runtime metadata.
     *
     * @return array updateMetadata function
     * @deprecated
     */
    public function getUpdateMetadataFunc()
    {
        return array($this, 'updateMetadata');
    }
    /**
     * Updates metadata with the authorization token.
     *
     * @param array $metadata metadata hashmap
     * @param string $authUri optional auth uri
     * @param callable $httpHandler callback which delivers psr7 request
     * @return array updated metadata hashmap
     */
    public function updateMetadata($metadata, $authUri = null, callable $httpHandler = null)
    {
        if (isset($metadata[self::AUTH_METADATA_KEY])) {
            // Auth metadata has already been set
            return $metadata;
        }
        $result = $this->fetchAuthToken($httpHandler);
        if (!isset($result['access_token'])) {
            return $metadata;
        }
        $metadata_copy = $metadata;
        $metadata_copy[self::AUTH_METADATA_KEY] = array('Bearer ' . $result['access_token']);
        return $metadata_copy;
    }
}
