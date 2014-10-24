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

    <meta name="google-site-verification" content="E-cr8gZJdvb6DBJUJMkA3dIhpu6i_ZXauEmAwjxNzzEY">
    <meta name='yandex-verification' content='4-2e08940108f30a5'>
    <meta http-equiv="Pragma" content="no-cache">

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>
    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('fancybox'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-css'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-js'); ?>

    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <meta name="description" content='<?php echo CHtml::encode($this->pageDescription); ?>'>
    <meta name="keywords" content='<?php echo CHtml::encode($this->pageKeywords); ?>'>

    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<?php echo $content; ?>

 <!-- Google.Analytics counter -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22832049-2']);
 _gaq.push(['_setDomainName', 'bristol-msk.ru']);

  _gaq.push(['_addOrganic', 'images.google.ru', 'q', true]);
  _gaq.push(['_addOrganic', 'images.yandex.ru', 'text', true]);
  _gaq.push(['_addOrganic', 'blogs.yandex.ru', 'text', true]);
  _gaq.push(['_addOrganic', 'blogsearch.google.ru', 'q', true]);
  _gaq.push(['_addOrganic', 'go.mail.ru', 'q']);
  _gaq.push(['_addOrganic', 'win.mail.ru', 'q']);
  _gaq.push(['_addOrganic', 'gogo.ru', 'q']);
  _gaq.push(['_addOrganic', 'nova.rambler.ru', 'query']);
  _gaq.push(['_addOrganic', 'nigma.ru', 's']);
  _gaq.push(['_addOrganic', 'google.com.ua', 'q']);
  _gaq.push(['_addOrganic', 'search.qip.ru', 'query']);
  _gaq.push(['_addOrganic', 'ru.yahoo.com', 'p']);
  _gaq.push(['_addOrganic', 'poisk.ru', 'text']);
  _gaq.push(['_addOrganic', 'aport.ru', 'r']);

  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
 <!-- /Google.Analytics counter -->

 <!-- Yandex.Metrika counter -->
 <script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter12157801 = new Ya.Metrika({id:12157801, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/12157801" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type="text/javascript">
(function() { var widget_id = '15112';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss); })(); </script>
<!-- {/literal} END JIVOSITE CODE -->


</body>


</html>

