<?php
class UserBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        $id = Yii::app()->user->id;

        if ($this->owner->isNewRecord) {
            $this->owner->created_user = $this->owner->modified_user = $id;
        } else {
            $this->owner->modified_user = $id;
        }
    }
}