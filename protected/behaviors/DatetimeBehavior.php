<?php
class DatetimeBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        if ($this->owner->isNewRecord) {
            $this->owner->created_datetime = $this->owner->modified_datetime = date('Y-m-d H:i:s');
        } else {
            $this->owner->modified_datetime = date('Y-m-d H:i:s');
        }
    }
}