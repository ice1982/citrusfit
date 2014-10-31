<?php
/* @var $this InstructorController */
/* @var $model Instructor */

$this->breadcrumbs=array(
    'Instructors'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Instructor', 'url'=>array('index')),
    array('label'=>'Create Instructor', 'url'=>array('create')),
);

?>

<h1>Manage Instructors</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'                    => 'instructor-grid',
    'dataProvider'          => $model->search(),
    'selectableRows'        => 0,
    // 'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'type'                  => 'striped',
    'columns'               => array(
        array(
            'name'        => 'fio',
            'htmlOptions' => array('class' => 'instructor-fio'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->fio), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить инструктора ' + $(this).parents('tr').children('.instructor-fio').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("instructor/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
