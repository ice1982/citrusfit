<?php

class SiteController extends BackEndController
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $this->render('//site/error', $error);
        }
    }
}