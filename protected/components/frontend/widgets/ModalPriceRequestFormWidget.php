<?php

class ModalPriceRequestFormWidget extends BaseModalFormWidget
{
    public $caption = 'Заказать прайс-лист';
    public $button = 'Заказать прайс-лист';

    public function run()
    {
        $form_model = new ModalPriceRequestForm;

        $this->render('modalPriceRequestFormWidget', array(
            'form_model' => $form_model,
            'caption' => $this->caption,
            'button' => $this->button,
        ));
    }

}