<?php

class AmocrmModel extends CModel
{
    const STATUS_REQUEST = '8309196';

    /* ----------- */

    public function __construct()
    {
        // parent::__construct();

        $auth = Yii::app()->amocrm->auth();

        // var_dump($auth);
    }

    public function addFreeWorkoutRequest($dump)
    {
        $result = Yii::app()->amocrm->ping();

        if (!$result) {
            return false;
        }

        $club = ClubItem::model()->active()->findByPk($dump['club_id']);

        $amocrm_user = $this->appointManager($club);

        $contact =  array(
            'person_name' => $dump['fio'],
            'contact_data' => array(
                'phone_numbers' => array(
                    array('number' => $dump['phone']),
                    array('location' => 'Other'),
                ),
            ),
            'main_user_id' => $amocrm_user,
        );

        $contact_id = $this->createContact($contact);

        $deal = array(
            'name' => strip_tags($dump['description']) . ' ' . $club->title . ' (' . date('Y-m-d H:i:s') . ')',
            'status_id' => self::STATUS_REQUEST,
            'linked_contact' => $contact_id,
            'main_user_id' => $amocrm_user,
        );
        $deal_id = $this->createDeal($deal);

        $deal_note = $dump['description'] . ' ' . $club->title . '; ' . $dump['system_info'];
        $deal_note = strip_tags($deal_note);

        $add_deal_note_result = $this->createNote($deal_id, $deal_note);

        // $task_id = $this->createTask($amocrm_user, $deal_id, 'Позвонить контакту', date('Y-m-d H:i:s'), 'CALL');

        $date = new DateTime(date('Y-m-d H:i:s'));
        $date->add(new DateInterval('P1D'));
        $date_end = $date->format('U');

        $task_id = $this->createTask($amocrm_user, $deal_id, 'Позвонить контакту', $date_end, 61964);

    }

    public function addItemRequest($dump)
    {
        $result = Yii::app()->amocrm->ping();

        if (!$result) {
            return false;
        }

        $club_title = 'Клуб не выбран';
        $club = ClubItem::model()->active()->findByPk($dump['club_id']);
        if (isset($club->title)) {
            $club_title = $club->title;
        }

        $amocrm_user = $this->appointManager($club);

        $contact =  array(
            'person_name' => $dump['fio'],
            'contact_data' => array(
                'phone_numbers' => array(
                    array('number' => $dump['phone']),
                    array('location' => 'Other'),
                ),
            ),
            'main_user_id' => $amocrm_user,
        );
        $contact_id = $this->createContact($contact);

        $deal = array(
            'name' => strip_tags($dump['description']) . ' ' . $club_title . ' (' . date('Y-m-d H:i:s') . ')',
            'status_id' => self::STATUS_REQUEST,
            'linked_contact' => $contact_id,
            'main_user_id' => $amocrm_user,
        );
        $deal_id = $this->createDeal($deal);

        $deal_note = $dump['description'] . ' ' . $club_title . '; ' . $dump['system_info'];
        $deal_note = strip_tags($deal_note);

        $add_deal_note_result = $this->createNote($deal_id, $deal_note);

        // $task_id = $this->createTask($amocrm_user, $amocrm_user, 'Позвонить контакту', date('Y-m-d'), 'CALL');
        $date = new DateTime(date('Y-m-d H:i:s'));
        $date->add(new DateInterval('P1D'));
        $date_end = $date->format('U');

        $task_id = $this->createTask($amocrm_user, $deal_id, 'Позвонить контакту', $date_end, 61964);
    }

    public function addSubscribeRequest($dump)
    {
        $result = Yii::app()->amocrm->ping();

        if (!$result) {
            return false;
        }

        $amocrm_user = $this->appointManager();

        $contact =  array(
            'person_name' => $dump['fio'],
            'contact_data' => array(
                'email_addresses' => array(
                    array('address' => $dump['email']),
                    array('location' => 'Other')
                ),
            ),
            'main_user_id' => $amocrm_user,
        );
        $contact_id = $this->createContact($contact);

        $deal = array(
            'name' => strip_tags($dump['description']) . ' (' . date('Y-m-d H:i:s') . ')',
            'status_id' => self::STATUS_REQUEST,
            'linked_contact' => $contact_id,
            'main_user_id' => $amocrm_user,
        );
        $deal_id = $this->createDeal($deal);

        $deal_note = $dump['description'] . '; ' . $dump['system_info'];
        $deal_note = strip_tags($deal_note);

        $add_deal_note_result = $this->createNote($deal_id, $deal_note);

        // $task_id = $this->createTask($amocrm_user, $amocrm_user, 'Добавить адрес в базу рассылки', date('Y-m-d'), 'LETTER');

        $date = new DateTime(date('Y-m-d H:i:s'));
        $date->add(new DateInterval('P1D'));
        $date_end = $date->format('U');

        $task_id = $this->createTask($amocrm_user, $deal_id, 'Добавить адрес в базу рассылки', $date_end, 1);

    }

    /* ----------- */

    protected function appointManager($club = false)
    {
        $amocrm_users = Yii::app()->params['amocrm']['users'];
        $amocrm_user = $amocrm_users[Yii::app()->params['managerEmail'][0]];

        if ( (isset($club->manager_email)) && (isset($amocrm_users[$club->manager_email]))) {
            $amocrm_user = $amocrm_users[$club->manager_email];
        }

        // var_dump($amocrm_user);

        return $amocrm_user;
    }

    protected function createContact($contact)
    {

        $add_contact_result = Yii::app()->amocrm->addContact($contact);

        if (empty($add_contact_result)) {
            return false;
        }

        return $add_contact_result;
    }

    protected function createDeal($deal)
    {
        $add_deal_result = Yii::app()->amocrm->addDeal($deal);

        if (empty($add_deal_result['result'])) {
            return false;
        }

        return $add_deal_result['result'];
    }

    protected function createNote($deal_id, $deal_note)
    {
        $add_deal_note_result = Yii::app()->amocrm->addDealNote($deal_id, $deal_note);

        return $add_deal_note_result;
    }

    public function createTask($manager_id, $deal_id, $message, $complete_till, $task_type)
    {
        $add_task_result = Yii::app()->amocrm->addTaskV2($deal_id, 2, $task_type, $message, $manager_id, $complete_till);

        return $add_task_result;
    }




    public function attributeNames()
    {

    }

}
