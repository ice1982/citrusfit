<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="robots" content="none">

    <?php Yii::app()->clientScript->registerPackage('jquery'); ?>

    <?php // Yii::app()->bootstrap->register(); ?>

    <?php Yii::app()->clientScript->registerPackage('bootstrap3'); ?>
    <?php Yii::app()->clientScript->registerPackage('jquery-ui'); ?>
    <?php Yii::app()->clientScript->registerPackage('nested-sortable'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-js'); ?>
    <?php Yii::app()->clientScript->registerPackage('my-admin-css'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php $this->widget('AdminMainMenu')?>

<div class="container-fluid" id="page">


	<?php if (isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'homeLink' => CHtml::link('', '/'),
            'links' => $this->breadcrumbs,
            'tagName' => 'ol',
            'htmlOptions' => array(
                'class' => 'breadcrumb',
            ),
            'activeLinkTemplate' => '<li><a href="{url}" title="{label}">{label}</a></li>',
            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
            'separator' => '   ',
            'encodeLabel' => false,
        )); ?>
	<?php endif?>


	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>

    <!-- TinyMCE -->
    <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            cleanup : false,
            content_css : "<?=Yii::app()->getBaseUrl(true)?>/css/bootstrap.min.css, <?=Yii::app()->getBaseUrl(true)?>/css/styles.css",
            convert_urls : false,
            editor_selector : "tinymce",
            editor_deselector : "no-tinymce",
            extended_valid_elements : "object[width|height|classid|codebase|embed|param],param[name|value],embed[param|src|type|width|height|flashvars|wmode],div[*],p[*],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder]",

            media_strict: false,

            mode : "specific_textareas",

            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "textcolor",
                "insertdatetime media table contextmenu paste jbimages"
            ],

            toolbar: "insertfile undo redo | forecolor backcolor | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | code",
            relative_urls : false,
            valid_elements : '*[*]'

        });
    </script>
    <!-- /TinyMCE -->


</html>
