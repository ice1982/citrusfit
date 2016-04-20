<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Список залов';

$this->breadcrumbs=array(
    'Залы' => array('index'),
    'Список залов',
);

$this->menu = array(
    array(
        'label' => 'Добавить зал',
        'icon' => 'plus',
        'url' => array('create')
    ),
);

?>

<h1>Список залов</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'club-hall-grid',
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
            'htmlOptions' => array('class' => 'club-hall-title'),
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name' => 'club_id',
            'type' => 'html',
            'value' => '$data->club->title'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить зал ' + $(this).parents('tr').children('.club-hall-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("clubs/admin/clubHalls/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
