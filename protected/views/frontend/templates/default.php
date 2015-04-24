<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?=$this->decodeWidgets($this->loadBlockBody('header'));?>

<div class="main-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse navbar-collapse container">
        <?php $this->widget('MainMenu', array('club_model' => $this->club)); ?>
    </div>
</div>

<div class="">

    <div class="content">

        <div class="container blank-padding white-blank">

            <?php if (isset($this->breadcrumbs)) : ?>
                <?php $this->widget('MyBreadcrumbs', array(
                    'homeLink' => CHtml::link('Главная', '/'),
                    'links' => $this->breadcrumbs,
                    'tagName' => 'ol',
                    'htmlOptions' => array(
                        'class' => 'breadcrumb',
                    ),
                    'activeLinkTemplate' => '<li><a href="{url}" title="{label}">{label}</a></li>',
                    'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                    'separator' => false,
                    'encodeLabel' => false,
                )); ?>
            <?php endif; ?>

            <?php if (isset($this->page->id) && $this->page->show_title == 1) : ?>
                <div class="font-h1 margin-h2"><?=$this->page->title?></div>
            <?php endif; ?>

            <?php if (isset($this->page->id)) : ?>
                <div>
                    <?=$this->decodeWidgets($this->page->begin_body)?>
                </div>
            <?php endif; ?>


            <?php echo $content; ?>


            <?php if (isset($this->page->id)) : ?>
                <div>
                    <?=$this->decodeWidgets($this->page->end_body)?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>

<?=$this->decodeWidgets($this->loadBlockBody('footer'));?>

<?php $this->endContent(); ?>
