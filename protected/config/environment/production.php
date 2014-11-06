<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'components'=>array(
            'db' => array(
                'connectionString' => 'CHANGEME',
                'emulatePrepare' => 'CHANGEME',
                'username' => 'CHANGEME',
                'password' => 'CHANGEME',
                'charset' => 'CHANGEME',
                'tablePrefix' => 'CHANGEME',
            ),
            'log' => array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class' => 'CEmailLogRoute',
//                        'categories' => 'errors',
                        'levels' => CLogger::LEVEL_ERROR,
                        'emails' => 'CHANGEME',
                        'sentFrom' => 'CHANGEME',
                        'subject' => 'CHANGEME',
                    ),
                    array(
                        'class' => 'CEmailLogRoute',
//                        'categories' => 'warnings',
                        'levels' => CLogger::LEVEL_WARNING,
                        'emails' => 'CHANGEME',
                        'sentFrom' => 'CHANGEME',
                        'subject' => 'CHANGEME',
                    ),
                ),
            ),
        ),
        'modules' => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(),
        ),
    )
);

?>
