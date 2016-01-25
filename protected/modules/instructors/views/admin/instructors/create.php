<?php

$this->breadcrumbs = array(
	'Инструктора' => array('index'),
	'Добавить',
);

$this->menu = array(
    array(
        'label' => 'Список инструкторов',
        'icon' => 'list',
        'url' => array('index')
    ),
);

?>

<h1>Добавить инструктора</h1>

<?php $this->renderPartial('_form',
    array(
        'model' => $model,
    )
); ?>