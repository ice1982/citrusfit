<?php

Yii::import('application.modules.clubs.models.*');

class FreeWorkoutRequestFormWidget extends BaseFormWidget
{
    public function run()
    {
        $widget_id = $this->genegateWidgetId('freeWorkoutRequestFormWidget');
        $button_class = $this->generateClasses();

        $form_model = new FreeWorkoutRequestForm;

        if (!empty(Yii::app()->session['club'])) {
            $form_model->club = Yii::app()->session['club'];
        }

        $clubs_list = ClubItem::model()->getClubsList();

        $this->render('freeWorkoutRequestFormWidget', array(
            'form_model' => $form_model,
            'form_caption' => $this->form_caption,
            'form_button' => $this->form_button,

            'form_widget_id' => $widget_id,

            'clubs_list' => $clubs_list,

            'button_class' => $button_class,
        ));
    }

}