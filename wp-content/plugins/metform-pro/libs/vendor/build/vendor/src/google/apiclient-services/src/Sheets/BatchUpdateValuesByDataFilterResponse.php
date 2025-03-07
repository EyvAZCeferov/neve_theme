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

class BatchUpdateValuesByDataFilterResponse extends \MetFormProVendor\Google\Collection
{
    protected $collection_key = 'responses';
    protected $responsesType = UpdateValuesByDataFilterResponse::class;
    protected $responsesDataType = 'array';
    public $spreadsheetId;
    public $totalUpdatedCells;
    public $totalUpdatedColumns;
    public $totalUpdatedRows;
    public $totalUpdatedSheets;
    /**
     * @param UpdateValuesByDataFilterResponse[]
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }
    /**
     * @return UpdateValuesByDataFilterResponse[]
     */
    public function getResponses()
    {
        return $this->responses;
    }
    public function setSpreadsheetId($spreadsheetId)
    {
        $this->spreadsheetId = $spreadsheetId;
    }
    public function getSpreadsheetId()
    {
        return $this->spreadsheetId;
    }
    public function setTotalUpdatedCells($totalUpdatedCells)
    {
        $this->totalUpdatedCells = $totalUpdatedCells;
    }
    public function getTotalUpdatedCells()
    {
        return $this->totalUpdatedCells;
    }
    public function setTotalUpdatedColumns($totalUpdatedColumns)
    {
        $this->totalUpdatedColumns = $totalUpdatedColumns;
    }
    public function getTotalUpdatedColumns()
    {
        return $this->totalUpdatedColumns;
    }
    public function setTotalUpdatedRows($totalUpdatedRows)
    {
        $this->totalUpdatedRows = $totalUpdatedRows;
    }
    public function getTotalUpdatedRows()
    {
        return $this->totalUpdatedRows;
    }
    public function setTotalUpdatedSheets($totalUpdatedSheets)
    {
        $this->totalUpdatedSheets = $totalUpdatedSheets;
    }
    public function getTotalUpdatedSheets()
    {
        return $this->totalUpdatedSheets;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(BatchUpdateValuesByDataFilterResponse::class, 'MetFormProVendor\\Google_Service_Sheets_BatchUpdateValuesByDataFilterResponse');
