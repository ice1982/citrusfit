<?php
class DatetimeBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        if ($this->owner->isNewRecord) {
            $this->owner->created_date = $this->owner->modified_date = date('Y-m-d H:i:s');
        } else {
            $this->owner->modified_date = date('Y-m-d H:i:s');
        }
    }
}