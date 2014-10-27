<?php if ($load_form) : ?>

    <a
        class="btn btn-primary btn-lg modal-item-request-button fancybox-modal"
        href="#<?=$form_widget_id?>"
        data-form-item="<?=$form_item_name?>",
        data-item="<?=$form_item_name?>",
    >
        <?=$button_text?>
    </a>

    <div style="display:none">
        <div id="<?=$form_widget_id?>" class="modal-window">
            <?php
                $this->render('itemRequestFormWidget', array(
                    'form_model' => $form_model,
                    'form_caption' => $form_caption,
                    'form_button' => $form_button,
                    'form_item_name' => $form_item_name,

                    'form_widget_id' => $form_widget_id,
                ));
            ?>
        </div>
    </div>

<?php else: ?>

    <a
        class="btn btn-primary btn-lg modal-item-request-button fancybox-modal"
        href="<?=$button_href?>"
        data-form-item="<?=$form_item_name?>",
        data-item="<?=$button_item?>",
        id="<?=$button_widget_id?>"
    >
        <?=$button_text?>
    </a>

    <?php

    $script = "
        $( 'body' ).on( 'click', '.modal-item-request-button', function( e ) {
            e.preventDefault();

            var item = $( this ).data( 'item' );
            var form_item = $( this ).data( 'form-item' );

            console.log( form_item );

            $( '#itemName' ).text( item );
            $( '" . $button_href . " .hidden-input-field' ).val( form_item );
            $( '" . $button_href . " .form-caption' ).text( item );
        } );
    ";

    Yii::app()->clientScript->registerScript('modalItemRequestButtonScript', $script, CClientScript::POS_END);

    ?>



<?php endif; ?>



