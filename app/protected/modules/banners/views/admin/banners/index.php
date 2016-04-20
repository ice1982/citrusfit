<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Список баннеров';

$this->breadcrumbs=array(
    'Баннеры'=>array('index'),
    'Список баннеров',
);

$this->menu = array(
    array(
        'label' => 'Добавить баннер',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => 'Сортировать баннеры',
        'icon' => 'move',
        'url' => array('order')
    ),
);

?>

<h1>Баннеры сайта</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'banner-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped',
    'selectableRows' => 0,
    'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'columns' => array(
        array(
            'class' => 'DataColumn',
            'evaluateHtmlOptions' => true,
            'type' => 'html',
            'htmlOptions' => array(
                'class' => '($data->active == 1) ? "td-active" : "td-inactive"',
                'title' => '($data->active == 1) ? "Выключить" : "Включить"',
            ),
            'value' => 'CHtml::link(($data->active == 1) ? "<span class=\'glyphicon glyphicon-off\'></span>" : "<span class=\'glyphicon glyphicon-play\'></span>", array(($data->active == 1) ? "turnOff" : "turnOn", "id" => $data->id))',
        ),
        'id',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => '"<img width=100 src=uploads/" . $data->image . ">"'
        ),
        array(
            'name' => 'title',
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить баннер ' + $(this).parents('tr').children('.banner-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("banners/admin/banners/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
