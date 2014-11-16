<?php

Yii::import('application.modules.blocks.*');
Yii::import('application.modules.blocks.models.*');
Yii::import('application.modules.blocks.models._forms.*');
Yii::import('application.modules.blocks.models._base.*');

Yii::import('application.modules.pages.*');
Yii::import('application.modules.pages.models.*');
Yii::import('application.modules.pages.models._forms.*');
Yii::import('application.modules.pages.models._base.*');

Yii::import('application.modules.forms.*');
Yii::import('application.modules.forms.models.*');
Yii::import('application.modules.forms.models._forms.*');
Yii::import('application.modules.forms.models._base.*');
Yii::import('application.modules.forms.components.*');
Yii::import('application.modules.forms.components.custom.*');
Yii::import('application.modules.forms.components.widgets.*');

Yii::import('application.modules.clubs.*');
Yii::import('application.modules.clubs.models.*');
Yii::import('application.modules.clubs.models._forms.*');
Yii::import('application.modules.clubs.models._base.*');

Yii::import('application.modules.gallery.*');
Yii::import('application.modules.gallery.models.*');
Yii::import('application.modules.gallery.models._forms.*');
Yii::import('application.modules.gallery.models._base.*');

Yii::import('application.modules.users.*');
Yii::import('application.modules.users.models.*');
Yii::import('application.modules.users.models._forms.*');
Yii::import('application.modules.users.models._base.*');

class BackEndController extends BaseController
{
    public $breadcrumbs = array();
    public $menu = array();

    public $layout = '//templates/column2';

    /*
        Фильтры
    */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            // 'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'users' => array('?'),
            ),
        );
    }
}