<?php

class SubscribeForm extends BaseFormModel
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
                'fio, email',
                'length',
                'max' => 100,
            ),
            array(
                'email',
                'email',
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

    public function send($main_message)
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        Yii::import('application.modules.clubs.models.*');

        $subject = 'Пользователь подписался на рассылку c сайта www.citrusfit.ru';

        $message = $main_message . '<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br>';
        $message .= $this->getAttributeLabel('email') . ': ' . $this->email . '<br>';

        $message .= '<br>';

        $form_request = new FormRequest;

        $form_request->fio = $this->fio;
        $form_request->email = $this->email;
        $form_request->description = 'Заявка на рассылку';
        $form_request->save();

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
