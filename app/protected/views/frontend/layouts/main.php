<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

    <?php if ($this->pageIndex != 1) : ?>
    <meta name="robots" content="none">
    <?php endif; ?>

    <!--[if lte IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/json2.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>
    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('fancybox'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-css'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-js'); ?>

   <meta name="viewport" content="width=1200">
   
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,400italic,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
     <!-- LeadoMed code -->
<script>
    (function() {
        var config = {
            API_BASE: 'http://connect.leadomed.ru',
            PROJECT_NAME: 'LeadoMed'
        };

        if (typeof window[config.PROJECT_NAME] === 'undefined' && typeof CallPluginInitObject === 'undefined') {
            window['CallPluginInitObject'] = config;

            var s = document.createElement('script');
            s.type = 'text/javascript';
            s.async = true;
            s.src = config.API_BASE + '/static/api.js';
            var x = document.getElementsByTagName('head')[0];
            x.appendChild(s);
        }
        else
            console.log(config.PROJECT_NAME + ' is already defined.');
    })();
</script>
<!-- LeadoMed code end -->
</head>

<body>

    <div class="">
        <?php echo $content; ?>
    </div>


</body>


</html>

