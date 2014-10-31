<?php
/* @var $this TypeOfArticleController */
/* @var $model TypeOfArticle */

$this->pageTitle = Yii::app()->name . ' - ' . 'Редактировать тип публикаций "' . $model->title . '"';

$this->breadcrumbs = array(
    'Типы публикаций' => array('index'),
    '"' . $model->title . '"' => array('update', 'id'=>$model->id),
);

$this->menu = array(
    array(
        'label' => 'Список типов публикаций',
        'icon'  => 'list',
        'url'   => array('index')
    ),
    array(
        'label' => 'Создать тип публикации',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Удалить тип публикации',
        'icon'  => 'remove',
        'url'   => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этот тип публикаций (' . $model->title . ')?'
        ),
    ),
);

?>

<h1>Редактировать тип публикаций "<?php echo $model->title; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>