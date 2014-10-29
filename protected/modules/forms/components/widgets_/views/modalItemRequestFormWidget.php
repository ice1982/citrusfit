<div style="display:none">
    <div id="modalItemRequest" class="modal-window">
        <h4><?=$caption?></h4>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'modalItemRequestForm',
            'action' => Yii::app()->createUrl('ajax/sendFromModalItemRequestForm'),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validationUrl' => Yii::app()->createUrl("ajax/sendFromModalItemRequestValidation" ),
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'validateOnType' => false,
                'afterValidate' => "js: function(form, data, hasError) {

                    if ( !hasError ) {

                        $.ajax( {
                            type: 'POST',
                            url: form[0].action,
                            data: $( form ).serialize(),
                            dataType: 'json',
                            success: function( response ) {

                                $( '#modalSuccess .message' ).text( response.message );

                                form[0].reset();

                                $.fancybox({
                                    closeBtn: true,
                                    href: '#modalSuccess',
                                    type: 'inline'
                                });

                                setTimeout( function() {
                                    $.fancybox.close();
                                }, 3000);

                            },
                            error: function( jqXHR, textStatus, errorThrown ) {
                                $( '#modalError .message' ).text( jqXHR.responseText );

                                form[0].reset();

                                $.fancybox({
                                    closeBtn: true,
                                    href: '#modalError',
                                    type: 'inline'
                                });

                                setTimeout( function() {
                                    $.fancybox.close({
                                        href: '#modalError'
                                    });
                                }, 3000);
                            }
                        } );
                    }

                    return false;

                }",
            ),
            'htmlOptions' => array(
                'class' => 'form-horizontal',
                'role' => 'form',
            ),
        )); ?>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'fio',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-9">
                    <?=$form->textField(
                        $form_model,
                        'fio',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Введите Ф.И.О.',
                            'type' => 'text',
                        )
                    );?>
                    <?=$form->error($form_model, 'fio');?>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'phone',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-7">
                    <?=$form->textField(
                        $form_model,
                        'phone',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Введите номер телефона',
                            'type' => 'phone',
                        )
                    );?>
                    <?=$form->error($form_model, 'phone');?>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'email',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-7">
                    <?=$form->textField(
                        $form_model,
                        'email',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Введите почту',
                            'type' => 'email',
                        )
                    );?>
                    <?=$form->error($form_model, 'email');?>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'item',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-9">
                    <?=$form->hiddenField(
                        $form_model,
                        'item',
                        array(
                            'class' => 'hidden-input-field',
                        )
                    );?>
                    <p id="itemName"></p>
                    <?=$form->error($form_model, 'item');?>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'quantity',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-5">
                    <?=$form->textField(
                        $form_model,
                        'quantity',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Введите количество',
                            'type' => 'text',
                        )
                    );?>
                    <?=$form->error($form_model, 'quantity');?>
                </div>
            </div>
            <div class="form-group">
                <?=$form->labelEx(
                    $form_model,
                    'comment',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>
                <div class="col-xs-9">
                    <?=$form->textArea(
                        $form_model,
                        'comment',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Введите комментарий',
                        )
                    );?>
                    <?=$form->error($form_model, 'comment');?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-3 control-label"></div>
                <div class="col-xs-9">
                    <?=CHtml::submitButton(
                        $button,
                        array(
                            'id' => 'modalItemRequestFormSubmit',
                            'class' => 'btn btn-primary',
                            'data-item' => '',
                        )
                    );?>
                </div>
            </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

<?php

$script = "
    $( 'body' ).on( 'click', '.modal-item-request', function( e ) {
        e.preventDefault();

        var item = $( this ).data( 'item' );

        $( '#itemName' ).text( $( this ).data( 'item-text' ));
        $( '#modalItemRequestForm .hidden-input-field' ).val( JSON.stringify( $( this ).data( 'item' ) ) );
    } );
";

Yii::app()->clientScript->registerScript('modalItemRequestFormScript', $script, CClientScript::POS_END);

?>
