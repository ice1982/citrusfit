<?php

class SiteController extends FrontEndController
{
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $this->render('//site/error', $error);
        }
    }
}