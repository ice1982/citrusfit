<?php
/* @var $this ClubController */
/* @var $model Club */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать клуб "' . $model->title . '"';

$this->breadcrumbs = array(
    'Карты' => array('index'),
    '"' . $model->title . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список клубов',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать клуб',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Выключить клуб' : 'Включить клуб',
        'icon'  => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url'   => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить клуб',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить эту клуб (' . $model->title . ')?'
        ),
    ),
);
?>

<h1>Редактировать клуб "<?php echo $model->title; ?>"</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>