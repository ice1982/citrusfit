<?php

class HeaderContactsWidget extends CWidget
{
    public function run()
    {
        $club = Yii::app()->getController()->club;

        $this->render('headerContactsWidget', array(
            'club' => $club
        ));
    }

}