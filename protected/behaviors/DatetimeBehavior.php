<?php
class DatetimeBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        $date = date('Y-m-d H:i:s');

        if ($this->owner->isNewRecord) {
            $this->owner->created_date = $date;

            if (isset($this->owner->modified_date)) {
                $this->owner->modified_date = $date;
            }
        } else {
            $this->owner->modified_date = $date;
        }
    }
}