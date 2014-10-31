<?php
/* @var $this HallController */
/* @var $model Hall */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать зал "' . $model->title . '"';

$this->breadcrumbs = array(
    'Карты' => array('index'),
    '"' . $model->title . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список залов',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать зал',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Выключить зал' : 'Включить зал',
        'icon'  => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url'   => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить зал',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить эту зал (' . $model->title . ')?'
        ),
    ),
);
?>

<h1>Редактировать зал "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>