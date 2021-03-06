<?php

class ModalItemRequestForm extends BaseModalFormModel
{
    public $fio;
    public $phone;
    public $email;
    public $item;
    public $quantity;
    public $comment;

    public function rules()
    {
        return array(
            array(
                'fio, phone, email, quantity',
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
            array(
                'quantity',
                'length',
                'max' => 20,
            ),
            array(
                'comment',
                'length',
                'max' => 500,
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fio' => 'Ф.И.О.',
            'phone' => 'Телефон',
            'email' => 'Email',
            'item' => 'Товар',
            'quantity' => 'Количество',
            'comment' => 'Комментарий',
        );
    }

    public function send()
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        $subject = 'Поступила заявка c сайта';

        $message = 'С сайта поступил запрос на стоимость.<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br>';
        $message .= $this->getAttributeLabel('phone') . ': ' . $this->phone . '<br>';
        $message .= $this->getAttributeLabel('email') . ': ' . $this->email . '<br>';

        $message .= '<br>';

        $item_array = json_decode($this->item);
        foreach ($item_array as $key => $value) {
            $message .= $key . ': ' . $value . '<br>';
        }

        $message .= '<br>';

        $message .= $this->getAttributeLabel('quantity') . ': ' . $this->quantity . '<br>';
        $message .= $this->getAttributeLabel('comment') . ': ' . $this->comment . '<br>';

        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
