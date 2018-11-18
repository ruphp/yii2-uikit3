<?php

namespace wm-apps\yii2_uikit3;

class AliasBehavior extends \yii\behaviors\SluggableBehavior
{
    protected function isNewSlugNeeded()
    {
    	if ($this->owner->isAttributeChanged($this->slugAttribute)) {
            return false;
        } 

        if (empty($this->owner->{$this->slugAttribute})) {
            return true;
        }
        if ($this->immutable) {
            return false;
        }
        foreach ((array)$this->attribute as $attribute) {
            if ($this->owner->isAttributeChanged($attribute)) {
                return true;
            }
        }
        return false;
    }
}