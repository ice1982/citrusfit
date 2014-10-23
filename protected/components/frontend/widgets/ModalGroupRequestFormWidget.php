<?php

class ModalGroupRequestFormWidget extends BaseModalFormWidget
{
    public function run()
    {
        $form_model = new ModalGroupRequestForm;

        $this->render('modalGroupRequestFormWidget', array(
            'form_model' => $form_model,
            'caption' => $this->caption,
            'button' => $this->button,
        ));
    }

}