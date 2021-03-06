<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => $form_widget_id,
    'action' => Yii::app()->createUrl('forms/ajax/sendFromFreeWorkoutRequestForm'), //sendFromFreeWorkoutRequestForm это экшен AjaxController'a где проходит валидация поста и отпправка в FreeWorkoutRequestForm.
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
                        yaCounter2667448.reachGoal('FORM_SUBMIT');

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
        'class' => $form_class,
        'role' => 'form',
    ),
)); ?>

<h4 class="form-caption"><?=$form_caption?></h4>

<div class="form-group">
    <?=$form->labelEx(
        $form_model,
        'club',
        array(
            'class' => '',
        )
    );?>


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

<div class="form-group">
    <?=$form->labelEx(
        $form_model,
        'fio',
        array(
            'class' => '',
        )
    );?>
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
<div class="form-group">
    <?=$form->labelEx(
        $form_model,
        'phone',
        array(
            'class' => '',
        )
    );?>
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

<div class="form-group">
       <?=$form->hiddenField(
            $form_model,
            'text',
            array(
                'class' => 'form-control',
                'type' => 'text',
            )
        );?>
        <?=$form->error($form_model, 'text');?>

</div>

<div class="form-group">
    <?=CHtml::submitButton(
        $form_button_text,
        array(
//                    'id' => 'modalItemRequestFormSubmit',
            'class' => $form_button_class,
            'data-item' => '',
            'onclick' => (!empty($form_button_yandex_target)) ? "yaCounter" . Yii::app()->params['yaCounter'] . ".reachGoal('" . $form_button_yandex_target . "', '" . $form_button_yandex_target_param . "'); return true;" : ""
        )
    );?>
</div>
<?php $this->endWidget(); ?>
