<?php

class DefaultController extends FrontEndController
{
    public function actionSwitchClub($id, $previous = true)
    {
        ClubItem::model()->switchClub($id);

        $referer = Yii::app()->request->getUrlReferrer();
        if (empty($referer)) {
            $previous = false;
        }

        if ($previous) {
            Yii::app()->request->redirect($referer);
        } else {
            Yii::app()->request->redirect(Yii::app()->createUrl('clubs/default/view', array('id' => $id)));
        }

        // echo Yii::app()->session['club'];
    }

    public function actionView($id)
    {
        $model = ClubItem::model();
        $model->switchClub($id);

        $club_content = $this->_loadModel($id, $model, true);

        $this->breadcrumbs[] = array(
            'route' => Yii::app()->createUrl('clubs/default/index'),
            'title' => 'Сеть клубов &laquo;Цитрус&raquo;',
        );
        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => 'Клуб &laquo;' . $club_content->title . '&raquo;',
        );

        $this->setPageTitle($club_content->title . ' | Сеть клубов Цитрус');

        $this->render('view',
            array(
                'club_content' => $club_content,
            )
        );
    }

	public function actionIndex()
	{
        $club_model = ClubItem::model();
        $clubs_content = $club_model->active()->findAll();

//        $this->breadcrumbs[] = array(
//            'route' => Yii::app()->createUrl('clubs/default/index'),
//            'title' => 'Сеть клубов &laquo;Цитрус&raquo;',
//        );
        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => 'Сеть клубов &laquo;Цитрус&raquo;',
        );

        if (empty($this->meta_title)) {
            $this->setPageTitle('Сеть клубов &laquo;Цитрус&raquo');
        }

		$this->render('index',
            array(
                'clubs_content' => $clubs_content,
                'previous' => false,
            )
        );
	}
}