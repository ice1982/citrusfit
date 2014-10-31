<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->pageTitle = Yii::app()->name . ' - ' . 'Список публикаций';

$this->breadcrumbs=array(
    'Публикации'=>array('index'),
    'Список публикаций',
);

$this->menu = array(
    array(
        'label' => 'Добавить публикацию',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#article-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Публикации сайта</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'     => true,
    'fade'      => true,
    'closeText' => '&times;',
)); ?>

<?php echo CHtml::link('<i class="icon-search"></i> Поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'                    => 'article-grid',
    'dataProvider'          => $model->search(),
    'selectableRows'        => 0,
    'rowCssClassExpression' => '($data->active == 1) ? "row-on" : "row-off"',
    'type'                  => 'striped',
    'columns'               => array(
        array(
            'class'               => 'DataColumn',
            'evaluateHtmlOptions' => true,
            'type'        => 'html',
            'htmlOptions'         => array(
                'class' => '($data->active == 1) ? "td-active" : "td-inactive"',
                'title' => '($data->active == 1) ? "Выключить" : "Включить"',
            ),
            'value'       => 'CHtml::link(($data->active == 1) ? "<i class=\'icon-off\'></i>" : "<i class=\'icon-play\'></i>", array(($data->active == 1) ? "turnOff" : "turnOn", "id" => $data->id))',
        ),
        array(
            'name'        => 'title',
            'htmlOptions' => array('class' => 'article-title'),
            'type'        => 'html',
            'value'       => 'CHtml::link(CHtml::encode($data->title), array("update", "id" => $data->id))'
        ),
        array(
            'name'        => 'club_id',
            'type'        => 'html',
            'value'       => 'isset($data->club->title) ? $data->club->title : "Все"',
        ),
        'pubdate',
        array(
            'name' => 'type_id',
            'type' => 'raw',
            'value' => '$data->type->title',
        ),
        array(
            'class'              => 'bootstrap.widgets.TbButtonColumn',
            'template'           => '{delete}',
            'deleteConfirmation' => "js:'Вы действительно хотите удалить публикацию ' + $(this).parents('tr').children('.article-title').text() + '?'",
            'buttons'            => array(
                'delete' => array(
                    'label' => 'Удалить',
                    'icon'  => 'remove',
                    'url'   => 'Yii::app()->createUrl("article/delete", array("id" => $data->id))',
                ),
            ),
        ),
    ),
)); ?>
