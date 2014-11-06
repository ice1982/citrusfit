<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать пользователя';

$this->breadcrumbs = array(
    'Список пользователей' => array('index'),
    'Создать нового',
);

$this->menu = array(
    array(
        'label' => 'Список пользователей',
        'icon' => 'list',
        'url' => array('index')
    ),
);
?>

<h1>Создать пользователя</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>