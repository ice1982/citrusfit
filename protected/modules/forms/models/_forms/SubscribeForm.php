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
        $form_request->system_info = Yii::app()->session['utm_session'];

        if ($form_request->save()) {
            $contact =  array(
                'person_name' => $this->fio,
                'contact_data' => array(
                    // 'phone_numbers' => array(
                    //     array('number' => '+7 499 891-01-11'),
                    //     array('location' => 'Other')
                    // ),
                    'email_addresses' => array(
                        array('address' => $this->email),
                        array('location' => 'Other')
                    ),
                ),
            );

            $deal = array(
                'name' => $form_request->description . ' (' . date('Y-m-d H:i:s') . ')',
                'status_id' => '8309196',
                'linked_contact' => $add_contact_result,
            );

            $deal_note = $form_request->description . '; ' . $form_request->system_info;

            $form_request->addRequestInAmoCrm($contact, $deal, $deal_note);
        }

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
