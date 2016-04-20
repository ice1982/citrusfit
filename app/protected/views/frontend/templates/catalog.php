<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?=$this->decodeWidgets($this->loadBlockBody('header'));?>


<!--<nav class="main-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse navbar-ex1-collapse container">
        <?php// $this->widget('MainMenu', array('current_page' => $this->page)); ?>

        <ul class="nav navbar-nav navbar-right search-block">
            <li class="dropdown search-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Быстрый поиск <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php// $this->widget('SearchPopupFormWidget'); ?>
                </ul>
            </li>
        </ul>
    </div>
</nav>-->

<div class="content">

    <div class="container">

        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'tagName' => 'ol',
                'separator' => ' / ',
                'links' => $this->breadcrumbs,
                'htmlOptions' => array(
                    'class' => 'breadcrumb',
                ),
            )); ?>
        <?php endif?>

        <?php echo $this->catalog_description; ?>
        <!-- navbar -->
        <?php $this->widget('CatalogMenu'); ?>
    </div>


    <?php echo $content; ?>

</div>



<?=$this->decodeWidgets($this->loadBlockBody('footer'));?>

<?php $this->endContent(); ?>