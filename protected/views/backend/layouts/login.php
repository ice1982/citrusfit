<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="robots" content="none">

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>
    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-js'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-css'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<div class="container-fluid" id="page">

	<?php echo $content; ?>

</div><!-- page -->

</body>

</html>
