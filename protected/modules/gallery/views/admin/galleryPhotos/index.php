<?php
/* @var $this GalleryPhotoController */
/* @var $model GalleryPhoto */

$this->breadcrumbs=array(
    'Gallery Photos'=>array('index'),
    'Manage',
);

$this->menu = array(
    array(
        'label' => 'Добавить фото',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Сортировать фото',
        'icon'  => 'move',
        'url'   => array('order')
    ),
);

?>

<h1>Manage Gallery Photos</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'             => 'gallery-photo-grid',
    'dataProvider'   => $model->search(),
    'selectableRows' => 0,
    'type'                  => 'striped',
    'columns'               => array(
        'id',
        array(
            'name' => 'image',
            'type' => 'raw',
            'value' => '"<img width=100 src=uploads/" . $data->image . ">"'
        ),
        array(
            'name'        => 'title',
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name' => 'album_id',
            'type' => 'html',
            'value' => '$data->galleryAlbum->title',
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить это фото?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("galleryPhoto/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>

