<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Список групп';

$this->breadcrumbs=array(
    'Группы' => array('index'),
    'Список групп',
);

$this->menu = array(
    array(
        'label' => 'Добавить группу',
        'icon' => 'plus',
        'url' => array('create')
    ),
);

?>

<h1>Группы товаров</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'catalog-group-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-striped',
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить группу ' + $(this).parents('tr').children('.catalog-group-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("catalog/admin/catalogGroups/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
