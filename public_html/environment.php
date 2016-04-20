<?php

$environment = 'development';
$debug = true;

$protected = '/../app/protected';

$yii = dirname(__FILE__) . '/../framework/1.1.16/yii.php';

if ($debug == true) {
    error_reporting(E_ALL);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
} else {
    define('YII_DEBUG', false);
    error_reporting(0);
}
?>