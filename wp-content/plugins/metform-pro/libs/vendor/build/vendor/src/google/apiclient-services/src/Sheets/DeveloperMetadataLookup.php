<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace MetFormProVendor\Google\Service\Sheets;

class DeveloperMetadataLookup extends \MetFormProVendor\Google\Model
{
    public $locationMatchingStrategy;
    public $locationType;
    public $metadataId;
    public $metadataKey;
    protected $metadataLocationType = DeveloperMetadataLocation::class;
    protected $metadataLocationDataType = '';
    public $metadataValue;
    public $visibility;
    public function setLocationMatchingStrategy($locationMatchingStrategy)
    {
        $this->locationMatchingStrategy = $locationMatchingStrategy;
    }
    public function getLocationMatchingStrategy()
    {
        return $this->locationMatchingStrategy;
    }
    public function setLocationType($locationType)
    {
        $this->locationType = $locationType;
    }
    public function getLocationType()
    {
        return $this->locationType;
    }
    public function setMetadataId($metadataId)
    {
        $this->metadataId = $metadataId;
    }
    public function getMetadataId()
    {
        return $this->metadataId;
    }
    public function setMetadataKey($metadataKey)
    {
        $this->metadataKey = $metadataKey;
    }
    public function getMetadataKey()
    {
        return $this->metadataKey;
    }
    /**
     * @param DeveloperMetadataLocation
     */
    public function setMetadataLocation(DeveloperMetadataLocation $metadataLocation)
    {
        $this->metadataLocation = $metadataLocation;
    }
    /**
     * @return DeveloperMetadataLocation
     */
    public function getMetadataLocation()
    {
        return $this->metadataLocation;
    }
    public function setMetadataValue($metadataValue)
    {
        $this->metadataValue = $metadataValue;
    }
    public function getMetadataValue()
    {
        return $this->metadataValue;
    }
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
    public function getVisibility()
    {
        return $this->visibility;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(DeveloperMetadataLookup::class, 'MetFormProVendor\\Google_Service_Sheets_DeveloperMetadataLookup');
