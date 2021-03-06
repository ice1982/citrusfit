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

            $dump = array(
                'fio' => $this->fio,
                'phone' => $this->phone,
                'club_id' => Yii::app()->session['club'],
                'description' => $form_request->description,
                'system_info' => $form_request->system_info,
            );

           try {
               $status_request = '1';
               $amocrm_user = '4';

               $contact =  array(
                   'name' => $dump['fio'],
                   'phone' => $dump['phone'],
                   'main_user_id' => $amocrm_user,
                   'status_request' => $status_request,
               );

               $result = $this->addContact($contact);
               $contact_result = json_decode($result, true);

               if ($contact_result['status'] == 'success') {
                   $contact_id = $contact_result['id'];

                   if (empty($contact_id)) {
                       $contact_id = false;
                   }

                   $lead = array(
                       'name' => strip_tags($dump['description']) . ' ' . $dump['club_id'] . ' (' . date('Y-m-d H:i:s') . ')',
                       'status_id' => $status_request,
                       'linked_contact' => $contact_id,
                       'main_user_id' => $amocrm_user,
                   );

                   $result = $this->addLead($lead);
                   $lead_result = json_decode($result, true);
               } else {

               }


           } catch (Exception $e) {

           }

            try {
                $amocrm = new AmocrmModel;
                $amocrm_request = $amocrm->addItemRequest($dump);
            } catch (CException $e) {

            }
        }

        // return true;
        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
