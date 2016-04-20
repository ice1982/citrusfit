<?php

Yii::import('application.modules.clubs.models.*');

class SimpleFormWidget extends BaseFormWidget
{
    public $show_form_item = false;

    protected function _loadFormWidget()
    {
        $form_widget_id = $this->genegateWidgetId('simpleFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $form_model = new ItemRequestForm;

        $styles = $this->generateStyles();

        $this->render('simpleFormWidget', array(
            'form_model' => $form_model,

            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,
            'form_class' => $this->form_class,
            'styles' => $styles,

            'form_item' => $this->form_item,

            'form_widget_id' => $form_widget_id,

            'show_form_item' => $this->show_form_item,

            'form_button_yandex_target' => $this->form_button_yandex_target,
            'form_button_yandex_target_param' => $this->form_button_yandex_target_param,
            'button_yandex_target' => $this->button_yandex_target,
            'button_yandex_target_param' => $this->button_yandex_target_param,
        ));
    }

    protected function _loadButtonWithFormWidget()
    {
        $form_widget_id = $this->genegateWidgetId('simpleFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $button_widget_id = $this->genegateWidgetId('simpleFormButtonWidget');
        $button_class = $this->generateClasses($this->button_type, $this->button_size, true);

        $styles = $this->generateStyles();

        $form_model = new ItemRequestForm;

        $this->render('simpleButtonAndFormWidget', array(
            'form_model' => $form_model,
            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,
            'form_widget_id' => $form_widget_id,
            'form_class' => $this->form_class,
            'form_item' => $this->form_item,
            'styles' => $styles,

            'button_widget_id' => $button_widget_id,
            'button_class' => $button_class,
            'button_text' => $this->button_text,

            'show_form_item' => $this->show_form_item,

            'form_button_yandex_target' => $this->form_button_yandex_target,
            'form_button_yandex_target_param' => $this->form_button_yandex_target_param,
            'button_yandex_target' => $this->button_yandex_target,
            'button_yandex_target_param' => $this->button_yandex_target_param,
        ));
    }

    protected function _loadButtonWithoutFormWidget()
    {
        $button_widget_id = $this->genegateWidgetId('simpleButtonWidget');
        $button_class = $this->generateClasses($this->button_type, $this->button_size, true);

        $this->render('simpleButtonWidget', array(
            'button_widget_id' => $button_widget_id,
            'button_class' => $button_class,
            'button_text' => $this->button_text,
            'button_href' => $this->button_href,

            'form_button_yandex_target' => $this->form_button_yandex_target,
            'form_button_yandex_target_param' => $this->form_button_yandex_target_param,
            'button_yandex_target' => $this->button_yandex_target,
            'button_yandex_target_param' => $this->button_yandex_target_param,
        ));
    }


}