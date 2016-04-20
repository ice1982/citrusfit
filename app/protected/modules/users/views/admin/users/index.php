<?php
/* @var $this UserController */
/* @var $model User */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список пользователей';

$this->breadcrumbs=array(
    'Пользователи' => array('index'),
    'Список пользователей',
);

$this->menu = array(
    array(
        'label' => 'Добавить пользователя',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

?>

<h1>Список пользователей</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'type-of-article-grid',
    'dataProvider' => $model->search(),
    'selectableRows' => 0,
    'itemsCssClass' => 'table table-striped',
    'enablePagination' => false,
    'summaryText' => false,
    'columns' => array(
        array(
            'name' => 'username',
            'htmlOptions' => array('class' => 'user-username'),
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->username), array("update", "id" => $data->id))'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить пользователя ' + $(this).parents('tr').children('.user-username').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("user/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
