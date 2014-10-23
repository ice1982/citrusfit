<?php
class BaseController extends CController
{

    // флеш-нотис пользователю
    public function setSuccess($message)
    {
        return Yii::app()->user->setFlash('success', $message);
    }

    // флеш-нотис пользователю
    public function setNotice($message)
    {
        return Yii::app()->user->setFlash('warning', $message);
    }

    // флеш-ошибка пользователю
    public function setError($message)
    {
        return Yii::app()->user->setFlash('danger', $message);
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     *
     */
    public function launchController($route, $exit = true, $properties = array())
    {
        $ca = Yii::app()->createController($route);

        list($controller, $actionID) = $ca;

        $controller->init();

        foreach ($properties as $name => $value) {
            $controller->$name = $value;
        }

        $controller->run($actionID);

        if ($exit) {
            Yii::app()->end();
        }

    }

}