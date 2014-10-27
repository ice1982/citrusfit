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

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php echo $content; ?>


</body>


</html>

