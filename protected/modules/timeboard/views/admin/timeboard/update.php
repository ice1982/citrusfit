<?php
/* @var $this WorkoutController */
/* @var $model Workout */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать занятие';

$this->breadcrumbs = array(
    'Расписание' => array('index'),
    'Редактировать занятие',
);

$this->menu = array(
    array(
        'label' => 'Список занятий',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать занятие',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Удалить занятие',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить это занятие?'
        ),
    ),
);
?>

<h1>Редактировать занятие</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array(
    'model' => $model,
)); ?>