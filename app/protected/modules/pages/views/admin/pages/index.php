<?php
/* @var $this PageController */
/* @var $model Page */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список страниц';

$this->breadcrumbs = array(
    'Страницы' => array('index'),
    'Список страниц',
);

$this->menu = array(
    array(
        'label' => 'Добавить страницу',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => 'Сортировать страницы',
        'icon' => 'move',
        'url' => array('order')
    ),
);

?>

<h1>Страницы сайта</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'page-grid',
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
        array(
            'name' => 'title',
            'htmlOptions' => array('class' => 'page-title'),
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name' => 'club_id',
            'type' => 'html',
            'value' => 'isset($data->club->title) ? $data->club->title : "Все"',
        ),
        'alias',
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить станицу ' + $(this).parents('tr').children('.page-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("pages/admin/pages/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
