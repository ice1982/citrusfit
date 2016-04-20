<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <?php $this->widget('TbAlert', array(
        'block' => true,
        'fade' => true,
        'closeText' => '&times;',
    )); ?>

    <?php echo $content; ?>

<?php $this->endContent(); ?>