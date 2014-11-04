<?php
/* @var $this HallController */
/* @var $model Hall */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список залов';

$this->breadcrumbs=array(
    'Залы' => array('index'),
    'Список залов',
);

$this->menu = array(
    array(
        'label' => 'Добавить зал',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список залов</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'hall-grid',
    'dataProvider'     => $model->search(),
    'selectableRows'   => 0,
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
            'htmlOptions' => array('class' => 'hall-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name'        => 'club_id',
            'type'        => 'html',
            'value'       => '$data->club->title'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить зал ' + $(this).parents('tr').children('.hall-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("hall/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
