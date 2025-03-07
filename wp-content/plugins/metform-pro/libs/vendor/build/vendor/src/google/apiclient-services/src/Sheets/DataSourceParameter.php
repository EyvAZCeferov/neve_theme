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

class DataSourceParameter extends \MetFormProVendor\Google\Model
{
    public $name;
    public $namedRangeId;
    protected $rangeType = GridRange::class;
    protected $rangeDataType = '';
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setNamedRangeId($namedRangeId)
    {
        $this->namedRangeId = $namedRangeId;
    }
    public function getNamedRangeId()
    {
        return $this->namedRangeId;
    }
    /**
     * @param GridRange
     */
    public function setRange(GridRange $range)
    {
        $this->range = $range;
    }
    /**
     * @return GridRange
     */
    public function getRange()
    {
        return $this->range;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(DataSourceParameter::class, 'MetFormProVendor\\Google_Service_Sheets_DataSourceParameter');
