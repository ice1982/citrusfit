<?php

$this->breadcrumbs=array(
    'Gallery Photos'=>array('index'),
    'Manage',
);

$this->menu = array(
    array(
        'label' => 'Добавить фото',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => 'Сортировать фото',
        'icon' => 'move',
        'url' => array('order')
    ),
);

?>

<h1>Manage Gallery Photos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'gallery-photo-grid',
    'dataProvider' => $model->search(),
    'selectableRows' => 0,
    'itemsCssClass' => 'table table-striped',
    'columns' => array(
        'id',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => 'CHtml::link("<img width=100 src=uploads/" . $data->image . ">", array("update", "id" => $data->id))'
        ),
        array(
            'name' => 'title',
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name' => 'album_id',
            'type' => 'html',
            'value' => '$data->album->title',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить это фото?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("gallery/admin/galleryPhotos/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>

