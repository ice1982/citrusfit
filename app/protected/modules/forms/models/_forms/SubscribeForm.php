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

            $dump = array(
                'fio' => $this->fio,
                'email' => $this->email,
                'description' => $form_request->description,
                'system_info' => $form_request->system_info,
            );

           try {
               $status_request = '1';
               $amocrm_user = '4';

               $contact =  array(
                   'name' => $dump['fio'],
                   'email' => $dump['email'],
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
                       'name' => strip_tags($dump['description']) . ' (' . date('Y-m-d H:i:s') . ')',
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
                $amocrm_request = $amocrm->addSubscribeRequest($dump);
            } catch (CException $e) {

            }


        }

        // return true;
        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
