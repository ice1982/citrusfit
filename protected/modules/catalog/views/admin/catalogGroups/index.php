<?php
/* @var $this CatalogGroupController */
/* @var $model CatalogGroup */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список групп';

$this->breadcrumbs=array(
    'Группы' => array('index'),
    'Список групп',
);

$this->menu = array(
    array(
        'label' => 'Добавить группу',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Группы товаров</h1>

<?php $this->widget('Alert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'           => 'catalog-group-grid',
    'dataProvider' => $model->search(),
    // 'filter'       => $model,
    'columns'      => array(
        array(
            'name'        => 'title',
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить группу ' + $(this).parents('tr').children('.article-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("catalogGroup/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
