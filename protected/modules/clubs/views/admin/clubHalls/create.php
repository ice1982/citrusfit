<?php

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать зал';

$this->breadcrumbs = array(
    'Залы' => array('index'),
    'Создать зал',
);

$this->menu = array(
    array(
        'label' => 'Список залов',
        'icon' => 'list',
        'url' => array('index')
    ),
);
?>

<h1>Добавить зал</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>