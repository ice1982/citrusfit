<?php
/* @var $this BlockController */
/* @var $model Block */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список блоков';

$this->breadcrumbs=array(
    'Блоки' => array('index'),
    'Список блоков',
);

$this->menu = array(
    array(
        'label' => 'Добавить блок',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список блоков</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'type-of-article-grid',
    'dataProvider'     => $model->search(),
    'selectableRows'   => 0,
    'type'             => 'striped',
    'enablePagination' => false,
    'summaryText'      => false,
    // 'filter'        => $model,
    'columns'          => array(
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
            'name'  => 'title',
            'type'  => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))',
        ),
        'slug',
    ),
)); ?>
