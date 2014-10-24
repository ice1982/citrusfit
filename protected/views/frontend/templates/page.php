<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?=$this->decodeWidgets($this->loadBlockBody('header'));?>

<nav class="main-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse navbar-ex1-collapse container">
        <?php $this->widget('MainMenu'); ?>
    </div>
</nav>

<?php echo $content; ?>

<?=$this->decodeWidgets($this->loadBlockBody('footer'));?>

<?php $this->endContent(); ?>
