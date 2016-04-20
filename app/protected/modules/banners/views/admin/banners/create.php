<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать баннер';

$this->breadcrumbs = array(
    'Баннеры' => array('index'),
    'Создать баннер',
);

$this->menu = array(
    array(
        'label' => 'Список баннеров',
        'icon' => 'list',
        'url' => array('index')
    ),
);
?>

<h1>Добавить баннер</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>