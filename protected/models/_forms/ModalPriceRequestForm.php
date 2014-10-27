<?php

class ModalPriceRequestForm extends BaseModalFormModel
{
    public $fio;
    public $email;

    public function rules()
    {
        return array(
            array(
                'fio, email',
                'required',
            ),
            array(
                'email',
                'email',
            ),
            array(
                'fio, email',
                'length',
                'max' => 100,
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fio' => 'Ф.И.О.',
            'email' => 'Email',
        );
    }

    public function send()
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        $subject = 'Поступила заявка c сайта';

        $message = 'С сайта поступил запрос на прайс-лист.<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br/>';
        $message .= $this->getAttributeLabel('email') . ': ' . $this->email . '<br/>';

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
