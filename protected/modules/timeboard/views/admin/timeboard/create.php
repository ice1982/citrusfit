<?php
/* @var $this WorkoutController */
/* @var $model Workout */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать занятие';

$this->breadcrumbs = array(
    'Расписание' => array('index'),
    'Создать занятие',
);

$this->menu = array(
    array(
        'label' => 'Расписание',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);
?>

<h1>Создать занятие</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>