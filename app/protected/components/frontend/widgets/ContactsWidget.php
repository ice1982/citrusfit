<?php

Yii::import('application.modules.clubs.models.*');

class ContactsWidget extends CWidget
{
    public function run()
    {
        //if (empty(Yii::app()->session['club'])) {
            // показываем все клубы
            $clubs = ClubItem::model()->active()->findAll();
       
//        } else {
//            // показываем 1 клуб
//            $club_id = Yii::app()->session['club'];
//            $clubs[] = ClubItem::model()->active()->findByPk($club_id);
//        }

        $this->render('contactsClubWidget',
            array(
                'clubs' => $clubs,
            )
        );
    }

}