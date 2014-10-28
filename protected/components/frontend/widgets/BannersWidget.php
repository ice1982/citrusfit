<?php

Yii::import('application.modules.banners.models.*');

class BannersWidget extends CWidget
{
    public function run()
    {
        $models = Banner::model()->active()->findAll(array('order' => 'nn'));

        $this->render('bannersWidget', array(
            'models' => $models,
        ));
    }

}