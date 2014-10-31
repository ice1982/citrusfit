<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

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

<?php $this->endContent(); ?>
