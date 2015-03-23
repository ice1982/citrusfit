<a class="<?=$button_class?>" href="#modal<?=$form_widget_id?>" id="<?=$button_widget_id?>" title="<?=$button_text?>" onclick="<?=(!empty($button_yandex_target)) ? "yaCounter" . Yii::app()->params['yaCounter'] . ".reachGoal('" . $button_yandex_target . "', '" . $button_yandex_target_param . "'); return true;" : ""?>">
    <?=$button_text?>
</a>

<div style="display:none">
    <div id="modal<?=$form_widget_id?>" class="modal-window">
        <?php $this->render('_forms/_freeWorkoutFormView', array(
            'form_model' => $form_model,

            'form_caption' => $form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $form_button_text,

            'form_widget_id' => $form_widget_id,
            'form_class' => $form_class,

            'clubs_list' => $clubs_list,


            'form_button_yandex_target' => $form_button_yandex_target,
            'form_button_yandex_target_param' => $form_button_yandex_target_param,
            'button_yandex_target' => $button_yandex_target,
            'button_yandex_target_param' => $button_yandex_target_param,
        )); ?>
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