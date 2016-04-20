<?php foreach ($catalog_group_models as $catalog_group) : ?>

    <?php if (
        (isset($catalog_items_content[$catalog_group->id])) &&
        (count($catalog_items_content[$catalog_group->id]) > 0)
        ) : ?>

        <div class="margin-h1">

            <div class="font-h4 margin-h3"><h3 style="text-align:left;"><?=$catalog_group->title?></h3></div>

            <?php foreach ($catalog_items_content[$catalog_group->id] as $catalog_item) : ?>

                <div class="margin-h3">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="<?=Yii::app()->createUrl('catalog/default/view', array('id' => $catalog_item->id))?>">
                                <?=CHtml::image(
                                    '/uploads/' . $catalog_item->image,
                                    $catalog_item->title,
                                    array(
                                        'class' => 'img-responsive',
                                    )
                                )?>
                            </a>
                        </div>
                        <div class="col-xs-9">
                            <div class="font-h4 margin-h3"><a href="<?=Yii::app()->createUrl('catalog/default/view', array('id' => $catalog_item->id))?>"><h3><?=$catalog_item->title?></h3></a></div>

                            <div class="row">
                                <div class="col-xs-8">
                                    <div>
                                        <?=$catalog_item->annotation?>
                                    </div>
                                </div>
                                <div class="col-xs-4">

                                    <a
                                        class="btn btn-default modal-item-request-button fancybox-modal"
                                        href="#modalCatalogItemRequest"
                                        data-item="<?=$catalog_item->group->title . ': ' . $catalog_item->title?>"
                                        data-item-text="<?=CHtml::encode($catalog_item->title)?>"
                                        onclick="yaCounter<?=Yii::app()->params['yaCounter']?>.reachGoal('CATALOG_BUTTON', '<?= $catalog_item->title ?>'); return true;"
                                    >
                                        Забронировать
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

<?php endforeach; ?>


<div style="display:none">
    <div id="modalCatalogItemRequest" class="modal-window">
        <?php
            $this->widget('SimpleFormWidget',
                array(
                    'type' => 'form',

                    'form_caption' => 'Забронировать карту',
                    'form_class' => 'catalog-form',

                    'form_button_text' => 'Забронировать',
                    'form_button_size' => 'default',
                    'form_button_type' => 'red',

                    'show_form_item' => true,

                    // 'form_button_yandex_target' => 'CATALOG_FORM_BUTTON',
                    // 'form_button_yandex_target_param' => addslashes($catalog_item->title),
                )
            );
        ?>
    </div>
</div>

<?php

$script = "
    $( 'body' ).on( 'click', '.modal-item-request-button', function( e ) {
        e.preventDefault();

        var item = $( this ).data( 'item' );

        console.log( item );

        $( '#itemName' ).text( $( this ).data( 'item-text' ));
        $( '#modalCatalogItemRequest .hidden-input-field' ).val( item );

        $( '#modalCatalogItemRequest input[type=submit]' ).attr( 'onclick', 'yaCounter" . Yii::app()->params['yaCounter'] . ".reachGoal(\'CATALOG_BUTTON\', ' + item + '); return true;' );
    } );
";

Yii::app()->clientScript->registerScript('catalogItemRequestFormScript', $script, CClientScript::POS_END);

?>

