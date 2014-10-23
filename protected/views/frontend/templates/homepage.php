<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?=$this->decodeWidgets($this->loadBlockBody('header'));?>

<nav class="main-navbar navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse navbar-ex1-collapse container">
        <?php $this->widget('MainMenu', array('current_page' => $this->page)); ?>

        <ul class="nav navbar-nav navbar-right search-block">
            <li class="dropdown search-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Быстрый поиск <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <?php $this->widget('SearchPopupFormWidget'); ?>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- [!get_special!] -->
<?=$this->decodeWidgets($this->loadBlockBody('special_block'));?>

<?php echo $content; ?>

<?=$this->decodeWidgets($this->loadBlockBody('footer'));?>

<?php $this->endContent(); ?>
