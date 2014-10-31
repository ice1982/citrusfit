<?php
/* @var $this ClubController */
/* @var $model Club */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать клуб';

$this->breadcrumbs = array(
    'Карты' => array('index'),
    'Создать клуб',
);

$this->menu = array(
    array(
        'label' => 'Список клубов',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);
?>

<h1>Добавить клуб</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>