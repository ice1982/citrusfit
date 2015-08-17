<?php

$environment = 'development';

switch (dirname(__FILE__)) {
    case '/Users/paveldanilov/Sites/sites.dev/citrusfit':
    case 'd:\OpenServer\domains\sites.dev\citrusfit':
    case 'D:\OpenServer\domains\sites.dev\citrusfit':
        $yii = dirname(__FILE__) . '/_framework/1.1.15/yii.php';
        $protected = '/protected';
        break;
    default:
        $environment = 'production';
        $yii = dirname(__FILE__) . '/../../frameworks/Yii/1.1.15/yiilite.php';
        $protected = '/../app/protected';
        break;
}

if (($environment == 'development') || ($environment == 'test')) {
   // define('YII_DEBUG', false);
   // error_reporting(0);
    error_reporting(E_ALL);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
} else {
    // error_reporting(E_ALL);
    // defined('YII_DEBUG') or define('YII_DEBUG', true);
    // defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
    define('YII_DEBUG', false);
    error_reporting(0);
}
?>