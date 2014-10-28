<?php

Yii::import('application.modules.clubs.models.*');

class AboutClubWidget extends CWidget
{
    public function run()
    {
        $behavior = new DInlineWidgetsBehavior;
        $behavior->startBlock = '{{w:';
        $behavior->endBlock = '}}';
        $behavior->widgets = array('GalleryBlock');

        // echo $behavior->decodeWidgets('{{w:GalleryBlock|album=Клуб ЮЗР}}');


        $club_id = Yii::app()->session['club'];

        $club_model = ClubItem::model();

        if (!empty($club_id)) {
            $club = $club_model->active()->findByPk($club_id);
        } else {
            $club = $club_model->findByPk(-1);
        }

        $this->render('aboutClubWidget',
            array(
                'club' => $club
            )
        );

    }

}