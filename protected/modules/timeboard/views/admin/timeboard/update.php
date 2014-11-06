<?php
/* @var $this WorkoutController */
/* @var $model Workout */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать занятие';

$this->breadcrumbs = array(
    'Расписание' => array('index'),
    $club->title => array('index'),
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

<?php echo $this->renderPartial('_form',
    array(
        'model' => $model,
        'club' => $club,
    )
); ?>