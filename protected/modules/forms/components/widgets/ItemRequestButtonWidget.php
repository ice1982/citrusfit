<?php

class ItemRequestButtonWidget extends BaseFormWidget
{
    public $load_form = true;
    public $button_href = null;
    public $button_text = '';
    public $button_item = '';

    public $form_class = '';

    public function run()
    {
        $widget_id = $this->genegateWidgetId('itemRequestButtonWidget');

        $button_class = $this->generateClasses();

        $load_form = (bool) $this->load_form;
        if ($load_form === true) {

            $widget_form_id = $this->genegateWidgetId('itemRequestFormWidget');

            $form_model = new ItemRequestForm;

            $this->render('itemRequestButtonWidget', array(
                'load_form' => $load_form,

                'form_model' => $form_model,
                'form_caption' => $this->form_caption,
                'form_button' => $this->form_button,
                'form_item_name' => $this->form_item,
                'form_class' => $this->form_class,
                'form_widget_id' => $widget_form_id,

                'button_text' => $this->button_text,
                'button_href' => $this->button_href,
                'button_item' => $this->button_item,
                'button_widget_id' => $widget_id,

                'button_class' => $button_class,
            ));

        } else {
            $this->render('itemRequestButtonWidget', array(
                'load_form' => $load_form,

                'form_item_name' => $this->form_item,

                'button_item' => $this->button_item,
                'button_text' => $this->button_text,
                'button_href' => $this->button_href,
                'button_widget_id' => $widget_id,

                'button_class' => $button_class,
            ));
        }
    }


}
