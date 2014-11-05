<?php
class IpBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        $ip = Yii::app()->request->getUserHostAddress() . ' ' . Yii::app()->request->getUserAgent();

        if ($this->owner->isNewRecord) {
            $this->owner->created_ip = $this->owner->modified_ip = $ip;
        } else {
            $this->owner->modified_ip = $ip;
        }
    }
}