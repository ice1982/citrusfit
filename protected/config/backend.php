<?php

return CMap::mergeArray(

    require_once(dirname(__FILE__) . '/main.php'),

    array(
        // стандартный контроллер
        'defaultController' => 'site/index',
        'homeUrl'           => array('site/index'),

        'import' => array(
            'application.components.backend.*',
            'application.components.backend.controllers.*',
            'application.components.backend.widgets.*',
        ),

        'modules'=>array(
            'gii'=>array(
                'generatorPaths'=>array(
                    'bootstrap.gii',
                ),
            ),
        ),

        // компоненты
        'components' => array(
            'clientScript' => array(
                'coreScriptPosition' => CClientScript::POS_HEAD,
                'packages' => array(
                    'my-admin-js' => array(
                        'baseUrl' => 'js/',
                        'js'      => array(
                            YII_DEBUG ? 'admin.js' : 'admin.min.js'
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-admin-css' => array(
                        'baseUrl' => 'css/',
                        'css'      => array('admin.css'),
                    ),
                ),
            ),

            // пользователь
            'user' => array(
                'class'          => 'WebUser',
                // enable cookie-based authentication
                'allowAutoLogin' => true,
                'loginUrl'       => array('/user/login'),
            ),

            'image'=>array(
                'class' => 'application.extensions.image.CImageComponent',
                    'driver' => 'GD',
            ),

            'bootstrap' => array(
                'class' => 'bootstrap.components.Bootstrap',
            ),
        ),
    )
);