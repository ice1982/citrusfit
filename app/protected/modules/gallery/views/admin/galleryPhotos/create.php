<?php

$this->breadcrumbs = array(
	'Gallery Photos' => array('index'),
	'Create',
);

$this->menu=array(
	array(
        'label' => 'List GalleryPhoto',
        'url' => array('index'),
    ),
	array(
        'label' => 'Manage GalleryPhoto',
        'url' => array('admin'),
    ),
);
?>

<h1>Create GalleryPhoto</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>