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
        $form_widget_id = $this->genegateWidgetId('freeWorkoutFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $button_widget_id = $this->genegateWidgetId('freeWorkoutButtonWidget');
        $button_class = $this->generateClasses($this->button_type, $this->button_size, true);

        $form_model = new FreeWorkoutRequestForm;
        if (!empty(Yii::app()->session['club'])) {
            $form_model->club = Yii::app()->session['club'];
        }

        $clubs_list = ClubItem::model()->getClubsList();

        // var_dump($this->form_class);

        $this->render('subscribeFormWidget', array(
            'form_model' => $form_model,
            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,
            'form_widget_id' => $form_widget_id,
            'form_class' => $this->form_class,

            'button_widget_id' => $button_widget_id,
            'button_class' => $button_class,
            'button_text' => $this->button_text,

            'clubs_list' => $clubs_list,

            'form_button_yandex_target' => $this->form_button_yandex_target,
            'form_button_yandex_target_param' => $this->form_button_yandex_target_param,
            'button_yandex_target' => $this->button_yandex_target,
            'button_yandex_target_param' => $this->button_yandex_target_param,
        ));
    }

    protected function _loadButtonWithoutFormWidget()
    {

    }

}