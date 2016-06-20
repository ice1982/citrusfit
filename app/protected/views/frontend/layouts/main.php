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

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter2667448 = new Ya.Metrika({
                        id: 2667448
                        , clickmap: true
                        , trackLinks: true
                        , accurateTrackBounce: true
                        , webvisor: true
                        , trackHash: true
                    });
                } catch (e) {}
            });
            var n = d.getElementsByTagName("script")[0]
                , s = d.createElement("script")
                , f = function () {
                n.parentNode.insertBefore(s, n);
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/2667448" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,400italic,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-78969589-3', 'auto');
        ga('send', 'pageview');

    </script>


    <!-- Код тега ремаркетинга Google -->
    <!--------------------------------------------------
    С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
    --------------------------------------------------->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 962541576;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/962541576/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

    

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

