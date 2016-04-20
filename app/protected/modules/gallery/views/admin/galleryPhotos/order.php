<?php
$this->pageTitle = Yii::app()->name . ' - ' . 'Сортировать фото';

$this->breadcrumbs=array(
    'Баннеры' => array('index'),
    'Сортировать фото',
);

$this->menu = array(
    array(
        'label' => 'Добавить фото',
        'icon' => 'plus',
        'url' => array('create')
    ),
    array(
        'label' => 'Список фотографий',
        'icon' => 'list',
        'url' => array('index')
    ),
);

?>

<div>
    <h2>Сортировать фото</h2>
    <p class="alert alert-info">Переставьте мышью элементы в нужном порядке и нажмите "Сохранить"</p>
    <div id="orderResult"></div>
    <div class="buttons">
        <input type="button" id="save" value="Сохранить" class="btn btn-primary" />
    </div>
</div>

<script>
$(function() {
    $.post( '<?=Yii::app()->createUrl("gallery/admin/galleryPhotos/orderAjax")?>', {}, function( data ) {
        $( '#orderResult' ).html( data );
    });

    $( '#save' ).click( function() {
        oSortable = $('.sortable').nestedSortable('toArray');

        $( '#orderResult' ).slideUp( function(){
            $.post( '<?=Yii::app()->createUrl("gallery/admin/galleryPhotos/orderAjax")?>', { sortable: oSortable }, function( data ) {
                $( '#orderResult' ).html( data );
                $( '#orderResult' ).slideDown();
            });
        });

    });
});
</script>