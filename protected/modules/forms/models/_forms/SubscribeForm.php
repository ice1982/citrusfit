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

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
