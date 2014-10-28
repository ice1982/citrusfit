<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="container blank-padding">

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

<?php $this->endContent(); ?>
