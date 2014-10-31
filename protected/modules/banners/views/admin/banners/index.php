<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список баннеров';

$this->breadcrumbs=array(
    'Баннеры'=>array('index'),
    'Список баннеров',
);

$this->menu = array(
    array(
        'label' => 'Добавить баннер',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Сортировать баннеры',
        'icon'  => 'move',
        'url'   => array('order')
    ),
);

?>

<h1>Баннеры сайта</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'             => 'banner-grid',
    'dataProvider'   => $model->search(),
    'selectableRows' => 0,
    'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'type'                  => 'striped',
    'columns'               => array(
        array(
            'class'               => 'DataColumn',
            'evaluateHtmlOptions' => true,
            'type'        => 'html',
            'htmlOptions'         => array(
                'class' => '($data->active == 1) ? "td-active" : "td-inactive"',
                'title' => '($data->active == 1) ? "Выключить" : "Включить"',
            ),
            'value'       => 'CHtml::link(($data->active == 1) ? "<i class=\'icon-off\'></i>" : "<i class=\'icon-play\'></i>", array(($data->active == 1) ? "turnOff" : "turnOn", "id" => $data->id))',
        ),
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => '"<img width=100 src=uploads/" . $data->image . ">"'
        ),
        array(
            'name'        => 'title',
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить баннер ' + $(this).parents('tr').children('.article-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("banner/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
