<?php
/* @var $this BlockController */
/* @var $model Block */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать блок';

$this->breadcrumbs = array(
    'Блоки' => array('index'),
    'Создать блок',
);

$this->menu = array(
    array(
        'label' => 'Список блоков',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);
?>

<h1>Создать блок</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>