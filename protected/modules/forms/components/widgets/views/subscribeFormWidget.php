<?php $this->render('_forms/_subscribeFormView', array(
    'form_model' => $form_model,

    'form_caption' => $form_caption,
    'form_button_class' => $form_button_class,
    'form_button_text' => $form_button_text,

    'form_widget_id' => $form_widget_id,
    'form_class' => $form_class,
)); ?>

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