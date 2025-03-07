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

class Editors extends \MetFormProVendor\Google\Collection
{
    protected $collection_key = 'users';
    public $domainUsersCanEdit;
    public $groups;
    public $users;
    public function setDomainUsersCanEdit($domainUsersCanEdit)
    {
        $this->domainUsersCanEdit = $domainUsersCanEdit;
    }
    public function getDomainUsersCanEdit()
    {
        return $this->domainUsersCanEdit;
    }
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }
    public function getGroups()
    {
        return $this->groups;
    }
    public function setUsers($users)
    {
        $this->users = $users;
    }
    public function getUsers()
    {
        return $this->users;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(Editors::class, 'MetFormProVendor\\Google_Service_Sheets_Editors');
