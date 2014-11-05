<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список карт';

$this->breadcrumbs=array(
    'Карты' => array('index'),
    'Список карт',
);

$this->menu = array(
    array(
        'label' => 'Добавить карту',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => 'Сортировать карты',
        'icon' => 'move',
        'url' => array('order')
    ),
);

?>

<h1>Список карт</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'catalog-grid',
    'dataProvider' => $model->search(),
    'selectableRows' => 0,
    'itemsCssClass' => 'table table-striped',
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
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        'price',
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить карту ' + $(this).parents('tr').children('.catalog-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("catalog/admin/catalogItems/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
