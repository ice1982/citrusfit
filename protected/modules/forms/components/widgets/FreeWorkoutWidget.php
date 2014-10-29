<?php

Yii::import('application.modules.clubs.models.*');

class FreeWorkoutWidget extends BaseFormWidget
{
    protected function _loadFormWidget()
    {
        $form_widget_id = $this->genegateWidgetId('freeWorkoutFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $form_model = new FreeWorkoutRequestForm;
        if (!empty(Yii::app()->session['club'])) {
            $form_model->club = Yii::app()->session['club'];
        }

        $clubs_list = ClubItem::model()->getClubsList();

        $this->render('freeWorkoutFormWidget', array(
            'form_model' => $form_model,

            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,

            'form_widget_id' => $form_widget_id,

            'clubs_list' => $clubs_list,
        ));
    }

    protected function _loadButtonWithFormWidget()
    {
        $form_widget_id = $this->genegateWidgetId('freeWorkoutFormWidget');
        $form_button_class = $this->generateClasses($this->form_button_type, $this->form_button_size);

        $button_widget_id = $this->genegateWidgetId('freeWorkoutButtonWidget');
        $button_class = $this->generateClasses($this->button_type, $this->button_size);

        $form_model = new FreeWorkoutRequestForm;
        if (!empty(Yii::app()->session['club'])) {
            $form_model->club = Yii::app()->session['club'];
        }

        $clubs_list = ClubItem::model()->getClubsList();

        $this->render('freeWorkoutButtonAndFormWidget', array(
            'form_model' => $form_model,
            'form_caption' => $this->form_caption,
            'form_button_class' => $form_button_class,
            'form_button_text' => $this->form_button_text,
            'form_widget_id' => $form_widget_id,

            'button_widget_id' => $button_widget_id,
            'button_class' => $button_class,
            'button_text' => $this->button_text,

            'clubs_list' => $clubs_list,
        ));
    }

    protected function _loadButtonWithoutFormWidget()
    {

    }

}