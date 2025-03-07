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

class PasteDataRequest extends \MetFormProVendor\Google\Model
{
    protected $coordinateType = GridCoordinate::class;
    protected $coordinateDataType = '';
    public $data;
    public $delimiter;
    public $html;
    public $type;
    /**
     * @param GridCoordinate
     */
    public function setCoordinate(GridCoordinate $coordinate)
    {
        $this->coordinate = $coordinate;
    }
    /**
     * @return GridCoordinate
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }
    public function getDelimiter()
    {
        return $this->delimiter;
    }
    public function setHtml($html)
    {
        $this->html = $html;
    }
    public function getHtml()
    {
        return $this->html;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(PasteDataRequest::class, 'MetFormProVendor\\Google_Service_Sheets_PasteDataRequest');
