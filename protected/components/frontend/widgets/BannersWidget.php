<?php

Yii::import('application.modules.banners.models.*');

class BannersWidget extends CWidget
{
    public $id = false;

    public function run()
    {
        $models = array();

        if ($this->id === false) {
            $models = Banner::model()->active()->findAll(array('order' => 'nn'));
        } else {
            $banner = Banner::model()->findByPk((int)$this->id);
            if (isset($banner->id)) {
                $models[] = $banner;
            }
        }

        $this->render('bannersWidget', array(
            'models' => $models,
        ));
    }

}