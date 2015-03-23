<?php

class SubscribeWidget extends BaseFormWidget
{
    protected $types = array('form');

    protected function _loadFormWidget()
    {
        $form_widget_id = $this->genegateWidgetId('freeWorkoutFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $form_model = new SubscribeForm;

        $this->render('subscribeFormWidget', array(
            'form_model' => $form_model,

            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,

            'form_widget_id' => $form_widget_id,
            'form_class' => $this->form_class,

            'form_button_yandex_target' => $this->form_button_yandex_target,
            'form_button_yandex_target_param' => $this->form_button_yandex_target_param,
            'button_yandex_target' => $this->button_yandex_target,
            'button_yandex_target_param' => $this->button_yandex_target_param,
        ));
    }

    protected function _loadButtonWithFormWidget()
    {

    }

    protected function _loadButtonWithoutFormWidget()
    {

    }

}