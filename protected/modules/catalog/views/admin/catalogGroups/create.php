<?php
/* @var $this CatalogGroupController */
/* @var $model CatalogGroup */

$this->pageTitle = Yii::app()->name . ' - ' . 'Создать группу';

$this->breadcrumbs = array(
    'Группы' => array('index'),
    'Создать группу',
);

$this->menu = array(
    array(
        'label' => 'Список групп',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);
?>

<h1>Добавить группу</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>