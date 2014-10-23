<?php

class ModalCallbackRequestFormWidget extends BaseModalFormWidget
{
    public $caption = 'Заказать обратный звонок';
    public $button = 'Заказать обратный звонок';

    public function run()
    {
        $form_model = new ModalCallbackRequestForm;

        $this->render('modalCallbackRequestFormWidget', array(
            'form_model' => $form_model,
            'caption' => $this->caption,
            'button' => $this->button,
        ));
    }

}