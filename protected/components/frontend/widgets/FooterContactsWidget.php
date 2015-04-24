<?php

class FooterContactsWidget extends CWidget
{
    public function run()
    {
        $club = Yii::app()->getController()->club;

        $this->render('footerContactsWidget', array(
            'club' => $club
        ));
    }

}