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

class SortSpec extends \MetFormProVendor\Google\Model
{
    protected $backgroundColorType = Color::class;
    protected $backgroundColorDataType = '';
    protected $backgroundColorStyleType = ColorStyle::class;
    protected $backgroundColorStyleDataType = '';
    protected $dataSourceColumnReferenceType = DataSourceColumnReference::class;
    protected $dataSourceColumnReferenceDataType = '';
    public $dimensionIndex;
    protected $foregroundColorType = Color::class;
    protected $foregroundColorDataType = '';
    protected $foregroundColorStyleType = ColorStyle::class;
    protected $foregroundColorStyleDataType = '';
    public $sortOrder;
    /**
     * @param Color
     */
    public function setBackgroundColor(Color $backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }
    /**
     * @return Color
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }
    /**
     * @param ColorStyle
     */
    public function setBackgroundColorStyle(ColorStyle $backgroundColorStyle)
    {
        $this->backgroundColorStyle = $backgroundColorStyle;
    }
    /**
     * @return ColorStyle
     */
    public function getBackgroundColorStyle()
    {
        return $this->backgroundColorStyle;
    }
    /**
     * @param DataSourceColumnReference
     */
    public function setDataSourceColumnReference(DataSourceColumnReference $dataSourceColumnReference)
    {
        $this->dataSourceColumnReference = $dataSourceColumnReference;
    }
    /**
     * @return DataSourceColumnReference
     */
    public function getDataSourceColumnReference()
    {
        return $this->dataSourceColumnReference;
    }
    public function setDimensionIndex($dimensionIndex)
    {
        $this->dimensionIndex = $dimensionIndex;
    }
    public function getDimensionIndex()
    {
        return $this->dimensionIndex;
    }
    /**
     * @param Color
     */
    public function setForegroundColor(Color $foregroundColor)
    {
        $this->foregroundColor = $foregroundColor;
    }
    /**
     * @return Color
     */
    public function getForegroundColor()
    {
        return $this->foregroundColor;
    }
    /**
     * @param ColorStyle
     */
    public function setForegroundColorStyle(ColorStyle $foregroundColorStyle)
    {
        $this->foregroundColorStyle = $foregroundColorStyle;
    }
    /**
     * @return ColorStyle
     */
    public function getForegroundColorStyle()
    {
        return $this->foregroundColorStyle;
    }
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }
    public function getSortOrder()
    {
        return $this->sortOrder;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(SortSpec::class, 'MetFormProVendor\\Google_Service_Sheets_SortSpec');
