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
                $message .= $key . ': ' . $value . '<br>';
            }
        } else {
            $message .= $this->item . '<br>';
        }


        $message .= '<br>';

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
