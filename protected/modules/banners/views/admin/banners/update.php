<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать баннер "' . $model->title . '"';

$this->breadcrumbs = array(
    'Баннеры' => array('index'),
    '"' . $model->title . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список баннеров',
        'icon' => 'list',
        'url' => array('index')
    ),
    array(
        'label' => 'Создать баннер',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Выключить баннер' : 'Включить баннер',
        'icon' => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url' => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить баннер',
        'icon' => 'remove',
        'url' => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этот баннер (' . $model->title . ')?'
        ),
    ),
);

?>

<h1>Редактировать баннер "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>