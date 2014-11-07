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

<?php



?>

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
            <div class="row margin-h2">
                <div class="col-xs-4">
                    <div class="font-h4 margin-h3">&copy; <?=date('Y')?>, фитнес-клуб &laquo;Цитрус&raquo;</div>
                </div>
                <div class="col-xs-4">
                    <div class="font-h4 margin-h3">Наши проекты</div>
                    <a href="http://девочкитакие.рф" title="Бар #ДевочкиТакиеДевочки" target="_blank"><img src="/img/dtd.png" width="250" alt=""/></a>
<!--                    <a href="#">Франшиза фитнес-клуба Цитрус</a>-->
                </div>
                <div class="col-xs-4">
                    <div class="font-h4 margin-h3"><?=$this->club->title?></div>
                    <div><?=$this->club->contact_phones?></div>
                    <div><?=$this->club->contact_address?></div>
                </div>
            </div>
            <hr/>
            <div class="row margin-h3">
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
                <div class="col-xs-4">

                </div>
                <div class="col-xs-4">
                    <!-- Yandex.Metrika informer --><a href="https://metrika.yandex.ru/stat/?id=2667448&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/2667448/3_0_FFFFD2FF_FFE4B2FF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" /></a><!-- /Yandex.Metrika informer -->
                </div>
            </div>
        </div>
    </div>

<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter2667448 = new Ya.Metrika({id:2667448, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/2667448" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

</body>


</html>

