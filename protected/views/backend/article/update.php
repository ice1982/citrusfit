<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать публикацию "' . $model->title . '"';

$this->breadcrumbs = array(
    'Публикации' => array('index'),
    '"' . $model->title . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список публикаций',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать публикацию',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Выключить публикацию' : 'Включить публикацию',
        'icon'  => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url'   => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить публикацию',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить эту публикацию (' . $model->title . ')?'
        ),
    ),
);

?>

<h1>Редактировать публикацию "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>