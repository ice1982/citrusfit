<?php

class BaseController extends CController
{
    public function init()
    {
        parent::init();

        $modules = $this->_getModulesNames();

        // var_dump($modules);

        foreach ($modules as $module) {
            Yii::import('application.modules.' . $module . '.*');
            Yii::import('application.modules.' . $module . '.models.*');
            Yii::import('application.modules.' . $module . '.models._forms.*');
            Yii::import('application.modules.' . $module . '.models._base.*');
            Yii::import('application.modules.' . $module . '.components.*');
            Yii::import('application.modules.' . $module . '.components.custom.*');
            Yii::import('application.modules.' . $module . '.components.widgets.*');
        }
    }

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

    protected function _getModulesNames()
    {
        $modules = array();

        $modules_dump = Yii::app()->modules;
        foreach ($modules_dump as $module_dump) {
            $module_array = explode('.', $module_dump['class']);
            $module = $module_array[0];

            if ($module == 'system') {
                continue;
            }

            $modules[] = $module;
        }

        return $modules;
    }

}