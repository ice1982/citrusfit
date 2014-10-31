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

    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,300italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <div class="header">
        <div class="container">
            <table>
                <tr>
                    <td class="header-block header-block1 border-divider">
                        <a href="/" title="На главную">
                            <img class="img-responsive" style="width: 200px" src="/img/logo.png" alt="Бристоль">
                        </a>
                    </td>
                    <td class="header-block header-block2 border-divider">
                        <?php
                            $this->widget('FreeWorkoutWidget',
                                array(
                                    'type' => 'button_with_form',

                                    'form_caption' => 'Записаться на бесплатное занятие',

                                    'form_button_text' => 'Записаться',
                                    'form_button_size' => 'default',
                                    'form_button_type' => 'red',

                                    'form_class' => 'catalog-form',

                                    'button_text' => 'Записаться на бесплатное занятие',
                                    'button_type' => 'red',
                                )
                            );
                        ?>
                    </td>
                    <td class="header-block header-block3">
                        <div class="contacts phone"><span class="glyphicon glyphicon-earphone"></span> <?=$this->club->contact_phones?></div>
                        <?php if ( (!empty(Yii::app()->session['club'])) && ($this->club->id != -1) ) : ?>
                            <div class="contacts club"><?=$this->club->title?></div>
                            <div class="contacts address"><?=$this->club->contact_address?></div>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="main-navbar navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse navbar-collapse container">
            <?php $this->widget('MainMenu', array('club_model' => $this->club)); ?>
        </div>
    </div>

    <div class="">
        <?php echo $content; ?>
    </div>


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
                <div class="col-xs-4">
                    <?php
                        $this->widget('SubscribeWidget',
                            array(
                                'type' => 'form',

                                'form_caption' => 'Подписка на спецпредложения',

                                'form_button_text' => 'Подписаться',
                                'form_button_size' => 'tiny',
                                'form_button_type' => 'default',

                                'form_class' => 'subscribe-form',
                            )
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>


</html>

