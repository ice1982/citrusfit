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
        
        $dump = array();

        $clubs = ClubItem::model()->active()->findAll();

        $workouts = [];
        foreach ($clubs as $club) {
            $workouts[$club->id] = TimeboardItem::model()->findAllItemsOfClub($club->id);
        }

        foreach ($workouts as $club_id => $workouts_array) {
            foreach ($workouts_array as $workout) {
                $dump[$club_id][$workout->hall->id][$workout->time_start][$workout->day_of_week] = $workout;
            }
        }

        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => 'Расписание',
        );

        if (empty($this->meta_title)) {
            $this->setPageTitle('Расписание | ' . 'Клуб ' . $this->club->title);
        }
        
//       var_dump($this->page);


        $this->render('index', array(
            'page' => $this->page,
            'clubs' => $clubs,
            'dump' => $dump,
        ));
    }

}