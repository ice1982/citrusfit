<?php

Yii::import('application.modules.clubs.models.*');

class MapWidget extends CWidget
{
    public $club = false;

    public function run()
    {
        $all_clubs = ClubItem::model()->active()->findAll();

        if (!empty($this->club)) {
            if ($this->club == 'all') {
                $club_id = false;
            } else {
                $club_id = (int)$this->club;
            }
        } else {
            $club_id = Yii::app()->session['club'];
        }

        if (!empty($club_id)) {
            $club = ClubItem::model()->active()->findByPk($club_id);
            $center = $club->contact_coordinates;
            $zoom = 14;
        } else {
            $club = false;
            $center = '56.135, 47.2';
            $zoom = 13;
        }

        $this->render('mapWidget', array(
            'all_clubs' => $all_clubs,
            'center' => $center,
            'zoom' => $zoom,
        ));
    }

}