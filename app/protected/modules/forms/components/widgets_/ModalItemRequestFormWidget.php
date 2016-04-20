<?php

class ModalItemRequestFormWidget extends BaseModalFormWidget
{
    public function run()
    {
        $form_model = new ModalItemRequestForm;

        $this->render('modalItemRequestFormWidget', array(
            'form_model' => $form_model,
            'caption' => $this->caption,
            'button' => $this->button,
        ));
    }

}