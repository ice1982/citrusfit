<?php
/* @var $this GalleryAlbumController */
/* @var $model GalleryAlbum */

$this->breadcrumbs = array(
	'Gallery Albums'=>array('index'),
	'Create',
);

$this->menu = array(
	array(
        'label' => 'List GalleryAlbum',
        'url' => array('index')
    ),
);
?>

<h1>Create GalleryAlbum</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>