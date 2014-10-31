<?php
/* @var $this TypeOfArticleController */
/* @var $model TypeOfArticle */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список типов публикаций';

$this->breadcrumbs=array(
    'Типы публикаций' => array('index'),
    'Список типов публикаций',
);

$this->menu = array(
    array(
        'label' => 'Добавить тип публикации',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список типов публикаций</h1>

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
            'name'        => 'title',
            'htmlOptions' => array('class' => 'typeofarticle-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        'slug',
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить тип ' + $(this).parents('tr').children('.typeofarticle-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("typeOfArticle/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
