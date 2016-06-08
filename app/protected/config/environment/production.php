<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'components'=>array(
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=citrusfit_site',
                'emulatePrepare' => true,
                'username' => 'citrusfit_site',
                'password' => 'S3s5R3i8',
                'charset' => 'utf8',
                'tablePrefix' => '',
            ),
//            'log' => array(
//                'class'=>'CLogRouter',
//                'routes'=>array(
//                    array(
//                        'class' => 'CEmailLogRoute',
////                        'categories' => 'errors',
//                        'levels' => CLogger::LEVEL_ERROR,
//                        'emails' => array('pv.danilov.dev@yandex.ru'),
//                        'sentFrom' => 'log@citrusfit.ru',
//                        'subject' => 'Критическая ошибка на citrusfit.ru',
//                    ),
//                    array(
//                        'class' => 'CEmailLogRoute',
////                        'categories' => 'warnings',
//                        'levels' => CLogger::LEVEL_WARNING,
//                        'emails' => array('pv.danilov.dev@yandex.ru'),
//                        'sentFrom' => 'log@citrusfit.ru',
//                        'subject' => 'Ошибка на citrusfit.ru',
//                    ),
//                ),
//            ),
        ),
        'modules' => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(),
        ),
    )
);

