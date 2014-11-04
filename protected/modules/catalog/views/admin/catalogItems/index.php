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
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Сортировать карты',
        'icon'  => 'move',
        'url'   => array('order')
    ),
);

?>

<h1>Список карт</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'             => 'catalog-grid',
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
            'name'        => 'title',
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        'price',
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить карту ' + $(this).parents('tr').children('.article-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("catalog/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
