<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать публикацию';

$this->breadcrumbs = array(
    'Публикации' => array('index'),
    'Создать новую',
);

$this->menu = array(
    array(
        'label' => 'Список публикаций',
        'icon' => 'list',
        'url' => array('index')
    ),
);

?>

<h1>Создать публикацию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>