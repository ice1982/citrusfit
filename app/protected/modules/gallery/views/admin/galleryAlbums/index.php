<?php

$this->breadcrumbs = array(
    'Gallery Albums' => array('index'),
    'Manage',
);

$this->menu = array(
    array(
        'label' => 'List GalleryAlbum',
        'url' => array('index')
    ),
    array(
        'label' => 'Create GalleryAlbum',
        'url' => array('create')
    ),
);

?>

<h1>Manage Gallery Albums</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'gallery-album-grid',
    'dataProvider' => $model->search(),
    'selectableRows' => 0,
    'itemsCssClass' => 'table table-striped',
    'columns' => array(
        array(
            'name' => 'title',
            'htmlOptions' => array('class' => 'gallery-album-title'),
            'type' => 'html',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить альбом ' + $(this).parents('tr').children('.gallery-album-title').text() + '?'",
            'buttons' => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon' => 'remove',
                    'url' => 'Yii::app()->createUrl("gallery/admin/galleryAlbums/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>

