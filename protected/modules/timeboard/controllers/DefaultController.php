<?php

class DefaultController extends FrontEndController
{

    public function init()
    {
        parent::init();

        Yii::import('application.modules.instructors.*');
        Yii::import('application.modules.instructors.models.*');
        Yii::import('application.modules.instructors.models._forms.*');
        Yii::import('application.modules.instructors.models._base.*');
    }


    public function actionIndex()
    {
        if (empty(Yii::app()->session['club'])) {
            // Выбор клуба
            $club_model = ClubItem::model();
            $clubs_content = $club_model->active()->findAll();

            $this->breadcrumbs = array(
                'Выбор клуба для показа расписания',
            );

            $this->render('application.modules.clubs.views.default.index',
                array(
                    'clubs_content' => $clubs_content,
                    'previous' => true,
                )
            );
        } else {
            $club_id = Yii::app()->session['club'];

            $workouts = TimeboardItem::model()->findAllItemsOfClub($club_id);
            foreach ($workouts as $workout) {
                $dump[$workout->hall->id][$workout->time_start][$workout->day_of_week] = $workout;
            }

            $this->breadcrumbs = array(
                'Сеть клубов &laquo;Цитрус&raquo;' => Yii::app()->createUrl('clubs/default/index'),
                'Клуб &laquo;' . $this->club->title . '&raquo;' => Yii::app()->createUrl('clubs/default/view', array('id' => $club_id)),
                'Расписание',
            );

            $this->render('index', array(
                'dump' => $dump,
            ));
        }
    }

}