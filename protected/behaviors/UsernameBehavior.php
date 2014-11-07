<?php
class UsernameBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        $username = Yii::app()->user->name;

        if ($this->owner->isNewRecord) {
            $this->owner->created_username = $this->owner->modified_username = $username;
        } else {
            $this->owner->modified_username = $username;
        }
    }
}