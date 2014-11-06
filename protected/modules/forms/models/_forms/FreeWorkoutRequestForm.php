<?php

class FreeWorkoutRequestForm extends BaseFormModel
{
    public $fio;
    public $phone;
    public $club;

    public function rules()
    {
        return array(
            array(
                'fio, phone, club',
                'required',
            ),
            array(
                'fio',
                'length',
                'max' => 100,
            ),
            array(
                'phone',
                'length',
                'max' => 20,
            ),
            array(
                'club',
                'numerical',
                'integerOnly' => true,
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fio' => 'Ф.И.О.',
            'phone' => 'Телефон',
            'club' => 'Клуб',
        );
    }

    public function send($main_message)
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        Yii::import('application.modules.clubs.models.*');
        $club = ClubItem::model()->active()->findByPk($this->club);

        $subject = 'Поступил заказ пробного занятия c сайта www.citrusfit.ru';

        $message = $main_message . '<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br>';
        $message .= $this->getAttributeLabel('phone') . ': ' . $this->phone . '<br>';

        $message .= '<br>';

        $message .= 'Клуб: ' . $club->title . '<br>';

        $message .= '<br>';

        $form_request = new FormRequest;
        $form_request->club_id = $this->club;
        $form_request->fio = $this->fio;
        $form_request->phone = $this->phone;
        $form_request->description = 'Пробное занятие';
        $form_request->save();

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
