<?php

class DefaultController extends FrontEndController
{
/**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        Yii::import('application.modules.timeboard.models.*');

        $instructor = $this->_loadModel($id, InstructorItem::model(), true);

        $clubs = ClubItem::model()->active()->findAll();

        $days = array(
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
            7 => 'Воскресенье',
        );

        $workouts = array();
        foreach ($instructor->timeboardItems as $key => $workout) {
            $workouts[$workout->day_of_week][$workout->time_start] = $workout;
        }

        foreach ($workouts as $key => $workout) {
            ksort($workouts[$key]);
        }

        $this->breadcrumbs[] = array(
            'route' => Yii::app()->createUrl('instructors/default/index'),
            'title' => 'Инструктора сети клубов &laquo;Цитрус&raquo;',
        );
        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => $instructor->fio,
        );

        if (empty($this->meta_title)) {
            $this->setPageTitle($instructor->fio);
        }

        $this->render('view', array(
            'instructor' => $instructor,
            'clubs' => $clubs,
            'workouts' => $workouts,
            'days' => $days,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $instructors = InstructorItem::model()->active()->findAll();

        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => 'Инструктора сети клубов &laquo;Цитрус&raquo;',
        );
        $this->setPageTitle('Инструктора сети клубов Цитрус');

        $this->render('index', array(
            'instructors' => $instructors,
        ));
    }}