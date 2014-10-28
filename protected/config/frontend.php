<?php
return CMap::mergeArray(

    require_once(dirname(__FILE__) . '/main.php'),
    array(
        // стандартный контроллер
        'defaultController' => 'site',

        'import' => array(
            'application.components.frontend.*.*',
            'application.components.frontend.controllers.*',
            'application.components.frontend.widgets.*',
        ),

        // компоненты
        'components' => array(

            'clientScript' => array(
                'coreScriptPosition' => CClientScript::POS_END,
                'packages' => array(
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
                    'fancybox' => array(
                        'baseUrl' => '',
                        'js' => array(
                            YII_DEBUG ? 'js/jquery.fancybox.js' : 'js/jquery.fancybox.pack.js'
                        ),
                        'css' => array(
                            'css/jquery.fancybox.css',
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-js' => array(
                        'baseUrl' => 'js/',
                        'js' => array(
                            YII_DEBUG ? 'main.js' : 'main.min.js'
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-css' => array(
                        'baseUrl' => 'css/',
                        'css' => array('styles.css?css=1'),
                    ),
                ),
            ),

            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    '' => 'pages/default/view',
                    '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                    '<alias:[\w\-]+>/*' => 'pages/default/view/<alias>',
                ),
            ),
        ),
    )
);