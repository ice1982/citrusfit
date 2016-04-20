<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Список типов публикаций';

$this->breadcrumbs=array(
    'Типы публикаций' => array('index'),
    'Список типов публикаций',
);

$this->menu = array(
    array(
        'label' => 'Добавить тип публикации',
        'icon' => 'plus',
        'url' => array('create')
    ),
);

?>

<h1>Список типов публикаций</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'               => 'type-of-article-grid',
    'dataProvider'     => $model->search(),
    'selectableRows'   => 0,
    'itemsCssClass' => 'table table-striped',
    'enablePagination' => false,
    'summaryText'      => false,
    // 'filter'        => $model,
    'columns'          => array(
        'id',
        array(
            'name'        => 'title',
            'htmlOptions' => array('class' => 'typeofarticle-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        'alias',
        array(
            'class'              => 'CButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить тип ' + $(this).parents('tr').children('.typeofarticle-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("articles/admin/articleTypes/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
