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

class UpdateConditionalFormatRuleResponse extends \MetFormProVendor\Google\Model
{
    public $newIndex;
    protected $newRuleType = ConditionalFormatRule::class;
    protected $newRuleDataType = '';
    public $oldIndex;
    protected $oldRuleType = ConditionalFormatRule::class;
    protected $oldRuleDataType = '';
    public function setNewIndex($newIndex)
    {
        $this->newIndex = $newIndex;
    }
    public function getNewIndex()
    {
        return $this->newIndex;
    }
    /**
     * @param ConditionalFormatRule
     */
    public function setNewRule(ConditionalFormatRule $newRule)
    {
        $this->newRule = $newRule;
    }
    /**
     * @return ConditionalFormatRule
     */
    public function getNewRule()
    {
        return $this->newRule;
    }
    public function setOldIndex($oldIndex)
    {
        $this->oldIndex = $oldIndex;
    }
    public function getOldIndex()
    {
        return $this->oldIndex;
    }
    /**
     * @param ConditionalFormatRule
     */
    public function setOldRule(ConditionalFormatRule $oldRule)
    {
        $this->oldRule = $oldRule;
    }
    /**
     * @return ConditionalFormatRule
     */
    public function getOldRule()
    {
        return $this->oldRule;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(UpdateConditionalFormatRuleResponse::class, 'MetFormProVendor\\Google_Service_Sheets_UpdateConditionalFormatRuleResponse');
