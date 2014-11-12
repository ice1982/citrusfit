<a class="<?=$button_class?>" href="#modal<?=$form_widget_id?>" id="<?=$button_widget_id?>">
    <?=$button_text?>
</a>

<div style="display:none">
    <div id="modal<?=$form_widget_id?>" class="modal-window">

        <?php $this->render('_forms/_simpleFormView', array(
            'form_model' => $form_model,

            'form_caption' => $form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $form_button_text,

            'form_item' => $form_item,
            'form_widget_id' => $form_widget_id,
            'form_class' => $form_class,
            'styles' => $styles,

            'show_form_item' => $this->show_form_item,
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