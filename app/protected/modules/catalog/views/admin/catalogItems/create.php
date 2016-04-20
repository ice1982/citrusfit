<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать карту';

$this->breadcrumbs = array(
    'Карты' => array('index'),
    'Создать карту',
);

$this->menu = array(
    array(
        'label' => 'Список карт',
        'icon' => 'list',
        'url' => array('index')
    ),
);
?>

<h1>Добавить карту</h1>

<?php echo $this->renderPartial('_form',
    array(
        'model' => $model,
    )
); ?>