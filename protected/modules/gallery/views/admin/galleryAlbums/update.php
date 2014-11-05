<?php

$this->breadcrumbs = array(
	'Gallery Albums' => array('index'),
	$model->title => array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array(
        'label' => 'List GalleryAlbum',
        'url' => array('index'),
    ),
	array(
        'label' => 'Create GalleryAlbum',
        'url' => array('create'),
    ),
	array(
        'label' => 'View GalleryAlbum',
        'url' => array('view', 'id'=>$model->id),
    ),
	array(
        'label' => 'Manage GalleryAlbum',
        'url' => array('admin'),
    ),
);
?>

<h1>Update GalleryAlbum <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>