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

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-3">
                    <img src="/img/logo.png" class="img-responsive" alt="">
                </div>
                <div class="col-xs-4">
                    <div class="btn btn-danger">
                        Записаться на бесплатное занятие
                    </div>
                </div>
                <div class="col-xs-5">
                    <div><?=$this->club->contact_phones?></div>
                    <div><?=$this->club->contact_address?></div>
                </div>
            </div>
        </div>

    </div>

    <div class="main-navbar navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse navbar-ex1-collapse container">
            <?php $this->widget('MainMenu', array('club_model' => $this->club)); ?>
        </div>
    </div>

	<?php echo $content; ?>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    &copy; <?=date('Y')?>, фитнес-клуб "Цитрус"
                </div>
                <div class="col-xs-4">
                    <a href="#">Франшиза фитнес-клуба Цитрус</a>
                </div>
                <div class="col-xs-4">
                    <div><?=$this->club->title?></div>
                    <div><?=$this->club->contact_phones?></div>
                    <div><?=$this->club->contact_address?></div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>

</body>


</html>

