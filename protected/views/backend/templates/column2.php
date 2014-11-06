<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="col-xs-10">
        <div id="content">

            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="col-xs-2">
        <div id="sidebar">
        <?php
            if (count($this->menu)) {
                array_unshift($this->menu, array('label' => 'Операции'));
                $this->widget('zii.widgets.CMenu', array(
                    'items'=> $this->menu,
                ));
            }
        ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>