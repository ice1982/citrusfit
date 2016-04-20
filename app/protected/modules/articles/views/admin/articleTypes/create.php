<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать тип публикации';

$this->breadcrumbs = array(
    'Список типов публикаций' => array('index'),
    'Создать новый',
);

$this->menu = array(
    array(
        'label' => 'Список типов публикаций',
        'icon' => 'list',
        'url' => array('index')
    ),
);
?>

<h1>Создать тип публикации</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>