<?php

// Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return CMap::mergeArray(

    require_once(dirname(__FILE__) . '/main.php'),

    array(
        // стандартный контроллер
        'defaultController' => 'site/index',
        'homeUrl' => array('site/index'),

        'import' => array(
            'application.components.backend.*',
            'application.components.backend.controllers.*',
            'application.components.backend.widgets.*',
            'application.components.backend.actions.*',
            'application.components.backend.actions._base.*',
        ),

        // 'modules'=>array(
        //     'gii'=>array(
        //         'generatorPaths'=>array(
        //             'bootstrap.gii',
        //         ),
        //     ),
        // ),

        // компоненты
        'components' => array(
            'clientScript' => array(
                'coreScriptPosition' => CClientScript::POS_HEAD,
                'packages' => array(
                    'jquery' => array(
                        'baseUrl' => 'js/',
                        'js' => array(
                            YII_DEBUG ? 'jquery-1.11.1.js' : 'jquery-1.11.1.min.js'
                        ),
                    ),
                    'bootstrap3' => array(
                        'baseUrl' => '',
                        'js' => array(
                            YII_DEBUG ? 'js/bootstrap.js' : 'js/bootstrap.min.js'
                        ),
                        'css' => array(
                            'css/bootstrap.min.css',
                            'css/bootstrap-theme.min.css',
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'jquery-ui' => array(
                        'baseUrl' => 'js/ui/',
                        'js' => array(YII_DEBUG ? 'jquery-ui.js' : 'minified/jquery-ui.min.js'),
                        'depends' => array('jquery'),
                    ),
                    'nested-sortable' => array(
                        'baseUrl' => 'js/',
                        'js' => array('jquery.mjs.nestedSortable.js'),
                        'depends' => array('jquery', 'jquery-ui'),
                    ),
                    'my-admin-js' => array(
                        'baseUrl' => 'js/',
                        'js' => array(
                            YII_DEBUG ? 'admin.js' : 'admin.min.js'
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-admin-css' => array(
                        'baseUrl' => 'css/',
                        'css' => array('admin.css'),
                    ),

                ),
            ),

            // пользователь
            'user' => array(
                'class' => 'WebUser',
                // enable cookie-based authentication
                'allowAutoLogin' => true,
                'loginUrl' => array('/users/admin/users/login'),
            ),

            'image'=>array(
                'class' => 'application.extensions.image.CImageComponent',
                    'driver' => 'GD',
            ),

            // 'bootstrap' => array(
            //     'class' => 'bootstrap.components.Bootstrap',
            // ),
        ),
    )
);