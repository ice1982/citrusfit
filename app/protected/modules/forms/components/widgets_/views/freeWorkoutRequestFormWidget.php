<a class="<?=$button_class?>" href="#modal<?=$form_widget_id?>">
    Записаться на бесплатное занятие
</a>

<div style="display:none">
    <div id="modal<?=$form_widget_id?>" class="modal-window">
        <h4 class="form-caption">Записаться на бесплатное занятие</h4>
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => $form_widget_id,
            'action' => Yii::app()->createUrl('forms/ajax/sendFromFreeWorkoutRequestForm'),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validationUrl' => Yii::app()->createUrl("forms/ajax/validationFreeWorkoutRequest", array('widget_id' => $form_widget_id)),
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

                                $( '#modalSuccess" . $form_widget_id . " .message' ).text( response.message );

                                form[0].reset();

                                $.fancybox({
                                    closeBtn: true,
                                    href: '#modalSuccess" . $form_widget_id . "',
                                    type: 'inline'
                                });

                                setTimeout( function() {
                                    $.fancybox.close();
                                }, 3000);

                            },
                            error: function( jqXHR, textStatus, errorThrown ) {
                                $( '#modalError" . $form_widget_id . " .message' ).text( jqXHR.responseText );

                                form[0].reset();

                                $.fancybox({
                                    closeBtn: true,
                                    href: '#modalError" . $form_widget_id . "',
                                    type: 'inline'
                                });

                                setTimeout( function() {
                                    $.fancybox.close({
                                        href: '#modalError" . $form_widget_id . "'
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
                    'club',
                    array(
                        'class' => 'col-xs-3 control-label',
                    )
                );?>

                <div class="col-xs-9">
                    <?=$form->dropDownList(
                        $form_model,
                        'club',
                        $clubs_list,
                        array(
                            'class' => 'form-control',
                            'empty' => '--- Выерите клуб ---',
                        )
                    );?>
                    <?=$form->error($form_model, 'club');?>
                </div>
            </div>

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
                <div class="col-xs-3 control-label"></div>
                <div class="col-xs-9">
                    <?=CHtml::submitButton(
                        'Записаться',
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

<div style="display:none">
    <div id="modalSuccess<?=$form_widget_id?>" class="modal-window">
        <div class="message">

        </div>
    </div>
</div>

<div style="display:none">
    <div id="modalError<?=$form_widget_id?>" class="modal-window">
        <div class="message">

        </div>
    </div>
</div>