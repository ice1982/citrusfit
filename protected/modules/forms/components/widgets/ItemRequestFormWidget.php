<?php

class ItemRequestFormWidget extends BaseFormWidget
{
    public $form_class = '';

    public function run()
    {
        $widget_id = $this->genegateWidgetId('itemRequestFormWidget');

        $form_model = new ItemRequestForm;

        $this->render('itemRequestFormWidget', array(
            'form_model' => $form_model,
            'form_caption' => $this->form_caption,
            'form_button' => $this->form_button,
            'form_item_name' => $this->form_item,

            'form_widget_id' => $widget_id,
            'form_class' => $this->form_class,
        ));
    }

}