<?php
$this->pageTitle = Yii::app()->name . ' - ' . 'Сортировать карты';

$this->breadcrumbs=array(
    'Клубные карты' => array('index'),
    'Сортировать карты',
);

$this->menu = array(
    array(
        'label' => 'Добавить карту',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Список карт',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);

?>

<div>
    <h2>Сортировать карты</h2>
    <p class="alert alert-info">Переставьте мышью элементы в нужном порядке и нажмите "Сохранить"</p>
    <div id="orderResult"></div>
    <div class="buttons">
        <input type="button" id="save" value="Сохранить" class="btn btn-primary" />
    </div>
</div>
