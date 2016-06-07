<?php

class FreeWorkoutRequestForm extends BaseFormModel
{
    public $fio;
    public $phone;
    public $club;
    public $text;

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
            array(
                'text',
                'safe',
            ),
        );
    }

    public function attributeLabels()
    {
        return array(
            'fio' => 'Ф.И.О.',
            'phone' => 'Телефон',
            'club' => 'Клуб',
            'text' => 'Метки utm',
        );
    }

    public function send($main_message)
    {
        $from = Yii::app()->params['fromEmail'];
        $email = Yii::app()->params['managerEmail'];

        Yii::import('application.modules.clubs.models.*');
        $club = ClubItem::model()->active()->findByPk($this->club);
        $array = json_decode(str_replace("'",'"', $this->text));//прием обработаного в аяксконтроллере поста и конвертация обратно в массив

        $subject = 'Поступил заказ c сайта www.citrusfit.ru';

        $message = $main_message . '<br><br>';

        $message .= $this->getAttributeLabel('fio') . ': ' . $this->fio . '<br>';
        $message .= $this->getAttributeLabel('phone') . ': ' . $this->phone . '<br>';
        
        foreach($array as $key => $value){
            $message .= 'Метки utm: ' . $key . ' -> ' . $value . '<br>';// разбиение и занесение полученого массива с метками в сообщение 
        }

        $utm_contacts = '';
        foreach($array as $key => $value){
            $utm_contacts .= '<br> Метка utm: ' . $key . ' -> ' . $value; //подготовка меток для CRM
        }
        
        $message .= '<br>';
        $message .= 'Клуб: ' . $club->title . '<br>';

        $message .= '<br>';

        $form_request = new FormRequest;
        $form_request->club_id = $this->club;
        $form_request->fio = $this->fio;
        $form_request->phone = $this->phone;
        $form_request->description = 'Пробное занятие';
        $form_request->system_info = Yii::app()->session['utm_session'];

        if ($form_request->save()) {
            $dump = array(
                'fio' => $this->fio,
                'phone' => $this->phone,
                'club_id' => $this->club,
                'comment' => $utm_contacts,// Занесение меток
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
                       'comment' => $dump['comment'],
                   );

                   $result = $this->addLead($lead);
                   $lead_result = json_decode($result, true);

               } else {

               }


           } catch (Exception $e) {

           }

//            try {
//                $amocrm = new AmocrmModel;
//                $amocrm_request = $amocrm->addFreeWorkoutRequest($dump);
//            } catch (CException $e) {
//                // var_dump($e);
//            }

        }

        // return true;
        return SendMail::sendEmail($from, $email, $subject, $message);
    }

}
