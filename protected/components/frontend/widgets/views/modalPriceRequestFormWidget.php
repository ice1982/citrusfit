<div style="display:none">
    <div id="modalPriceRequest" class="modal-window">
        <h4><?=$caption?></h4>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'modalPriceRequestForm',
            'action' => Yii::app()->createUrl('ajax/sendFromModalPriceRequestForm'),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validationUrl' => Yii::app()->createUrl("ajax/sendFromModalPriceRequestValidation" ),
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
                <div class="col-xs-3 control-label"></div>
                <div class="col-xs-9">
                    <?=CHtml::submitButton(
                        $button,
                        array(
                            'id' => 'modalPriceRequestFormSubmit',
                            'class' => 'btn btn-primary',
                            'data-item' => '',
                        )
                    );?>
                </div>
            </div>
        <?php $this->endWidget(); ?>
    </div>
</div>

