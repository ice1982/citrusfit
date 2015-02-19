<?php

class ItemRequestForm extends BaseFormModel
{
    public $fio;
    public $phone;
    public $item;

    public function rules()
    {
        return array(
            array(
                'fio, phone',
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
                'item',
                'length',
                'max' => 400,
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fio' => 'Ф.И.О.',
            'phone' => 'Телефон',
            'item' => 'Товар',
        );
    }

    public function send($main_message)
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        $subject = 'Поступила заявка c сайта www.citrusfit.ru';

        $message = $main_message . '<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br>';
        $message .= $this->getAttributeLabel('phone') . ': ' . $this->phone . '<br>';

        $message .= '<br>';

        if (CHelper::isJson($this->item)) {
            $item_array = json_decode($this->item);
            foreach ($item_array as $key => $value) {
                $item = $key . ': ' . $value . '<br>';
            }
        } else {
            $item = $this->item . '<br>';
        }

        $message .= $item;


        $message .= '<br>';

        $form_request = new FormRequest;

        $form_request->fio = $this->fio;
        $form_request->phone = $this->phone;
        $form_request->description = 'Заявка с сайта. ' . $item;
        $form_request->system_info = Yii::app()->session['utm_session'];

        if ($form_request->save()) {
            $contact =  array(
                'person_name' => $this->fio,
                'contact_data' => array(
                    'phone_numbers' => array(
                        array('number' => $this->phone),
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
