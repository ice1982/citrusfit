<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?=$this->decodeWidgets($this->loadBlockBody('header'));?>

<div class="main-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse navbar-collapse container">
        <?php $this->widget('MainMenu', array('club_model' => $this->club)); ?>
    </div>
</div>

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

    <?=$this->decodeWidgets($this->loadBlockBody('footer'));?>

<?php $this->endContent(); ?>
