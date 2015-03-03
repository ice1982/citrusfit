<?php
return CMap::mergeArray(

    require_once(dirname(__FILE__) . '/main.php'),
    array(
        // стандартный контроллер
        'defaultController' => 'pages/default/view/',

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
                'urlSuffix' => '',
                'rules' => array(

//                    'forms/ajax/<action:\d+>/*' => 'forms/ajax/<action>',
                    '<module:(forms)>/<controller:(ajax)>/<action:\w+>' => '<module>/<controller>/<action>',
                    '<module:(amocrm)>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',

                    'catalog' => 'catalog/default/index',
                    'catalog/<id:\d+>' => 'catalog/default/view/',

                    'raspisanie' => 'timeboard/default/index',
                    'timeboard' => 'timeboard/default/index',

                    'instructor' => 'instructors/default/index',
                    'instructors' => 'instructors/default/index',
                    'instructors/<id:\d+>' => 'instructors/default/view/',

                    'clubs' => 'clubs/default/index',
                    'clubs/<id:\d+>' => 'clubs/default/view/',
                    'clubs/switch/<id:\d+>' => 'clubs/default/switchClub/',

                    'articles' => 'articles/default/index',
                    'articles/<id:\d+>' => 'articles/default/view/',

                    '<alias:[\w\-]+>/*' => array('pages/default/view/', 'alias'=>'<alias>'),
                ),
            ),
        ),
    )
);