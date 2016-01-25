<?php

$this->breadcrumbs = array(
    'Инструктора' => array('index'),
    'Список',
);

$this->menu = array(
    array(
        'label' => 'Добавить инструктора',
        'url' => array('create'),
    ),
);

?>

<h1>Список инструкторов</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'instructor-grid',
    'dataProvider' => $model->search(),
    'selectableRows' => 0,
    'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'itemsCssClass' => 'table table-striped',
    'columns' => array(
        array(
            'name' => 'fio',
            'htmlOptions' => array('class' => 'instructor-fio'),
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->fio), array("update", "id" => $data->id))'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить инструктора ' + $(this).parents('tr').children('.instructor-fio').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("instructors/admin/instructors/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
