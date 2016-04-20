<?php


$this->breadcrumbs = array(
	'Gallery Photos' => array('index'),
	$model->title => array('view', 'id' => $model->id),
	'Update',
);

$this->menu = array(
	array(
        'label'=>'List GalleryPhoto',
        'url' => array('index'),
    ),
	array(
        'label'=>'Create GalleryPhoto',
        'url' => array('create'),
    ),
	array(
        'label'=>'View GalleryPhoto',
        'url' => array('view', 'id'=>$model->id),
    ),
	array(
        'label'=>'Manage GalleryPhoto',
        'url' => array('admin'),
    ),
);
?>

<h1>Update GalleryPhoto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>