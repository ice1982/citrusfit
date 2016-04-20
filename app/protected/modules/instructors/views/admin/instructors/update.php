<?php

$this->breadcrumbs = array(
	'Инструктора' => array('index'),
	$model->fio => array('view', 'id' => $model->id),
	'Редактировать',
);

$this->menu = array(
    array(
        'label' => 'Список инструкторов',
        'icon' => 'list',
        'url' => array('index')
    ),
    array(
        'label' => 'Добавить инструктора',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => ($model->active == 1) ? 'Заблокировать инструктора' : 'Включить инструктора',
        'icon' => ($model->active == 1) ? 'icon-off' : 'icon-ok',
        'url' => ($model->active == 1) ? array('turnOff', 'id' => $model->id) : array('turnOn', 'id' => $model->id)
    ),
    array(
        'label' => 'Удалить инструктора',
        'icon' => 'remove',
        'url' => array('delete', 'id' => $model->id),
        'htmlOptions' => array(
            'confirm' => 'Вы действительно хотите удалить этого инструктора (' . $model->fio . ')?'
        ),
    ),
);

?>

<h1>Редактировать инструктора <?php echo $model->fio; ?></h1>

<?php $this->renderPartial('_form',
    array(
        'model' => $model,
    )
); ?>