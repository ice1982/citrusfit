<?php
/* @var $this ClubController */
/* @var $model Club */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список клубов';

$this->breadcrumbs=array(
    'Клубы' => array('index'),
    'Список клубов',
);

$this->menu = array(
    array(
        'label' => 'Добавить клуб',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список клубов</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'               => 'club-grid',
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
            'htmlOptions' => array('class' => 'club-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить клуб ' + $(this).parents('tr').children('.club-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("club/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
