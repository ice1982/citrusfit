<?php

class ModalItemRequestFormWidget extends CWidget
{
    public $caption = 'Узнать подробную информацию';
    public $button = 'Узнать стоимость';

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