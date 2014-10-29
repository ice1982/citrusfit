<?php

class BaseWebModule extends CWebModule
{
    public $page = false;

    public function init()
    {
        $this->_setImport();
        $this->_setPage();
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else {
            return false;
        }
    }

    protected function _setImport()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            $this->id . '.models.*',
            $this->id . '.models._base.*',
            $this->id . '.models._form.*',

            $this->id . '.components.*',
            $this->id . '.components.custom.*',
            $this->id . '.components.widgets.*',
            $this->id . '.components.widgets.views.*',
        ));
    }

    protected function _setPage()
    {
        if ($this->id != 'pages') {
            Yii::import('application.modules.pages.models.*');
            $this->page = Page::model()->active()->findByAttributes(array('module' => $this->id));
        }
    }
}
