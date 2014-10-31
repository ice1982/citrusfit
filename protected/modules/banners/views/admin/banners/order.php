<?php
$this->pageTitle = Yii::app()->name . ' - ' . 'Сортировать баннеры';

$this->breadcrumbs=array(
    'Баннеры' => array('index'),
    'Сортировать баннеры',
);

$this->menu = array(
    array(
        'label' => 'Добавить баннер',
        'icon'  => 'plus',
        'url'   => array('create')
    ),
    array(
        'label' => 'Список баннеров',
        'icon'  => 'list',
        'url'   => array('index')
    ),
);

?>

<div>
    <h2>Сортировать баннеры</h2>
    <p class="alert alert-info">Переставьте мышью элементы в нужном порядке и нажмите "Сохранить"</p>
    <div id="orderResult"></div>
    <div class="buttons">
        <input type="button" id="save" value="Сохранить" class="btn btn-primary" />
    </div>
</div>

<script>
$(function() {
    $.post( 'admin.php?r=banner/orderAjax', {}, function( data ) {
        $( '#orderResult' ).html( data );
    });

    $( '#save' ).click( function() {
        oSortable = $('.sortable').nestedSortable('toArray');

        $( '#orderResult' ).slideUp( function(){
            $.post( 'admin.php?r=banner/orderAjax', { sortable: oSortable }, function( data ) {
                $( '#orderResult' ).html( data );
                $( '#orderResult' ).slideDown();
            });
        });

    });
});
</script>