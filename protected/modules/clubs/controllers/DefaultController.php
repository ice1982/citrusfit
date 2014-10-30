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
        $this->breadcrumbs = array(
            'Сеть клубов &laquo;Цитрус&raquo;' => Yii::app()->createUrl('clubs/default/index'),
            'Клуб &laquo;' . $club_content->title . '&raquo;',
        );

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

        $this->breadcrumbs = array(
            'Сеть клубов &laquo;Цитрус&raquo;' => Yii::app()->createUrl('clubs/default/index'),
            'Выбор клуба',
        );

		$this->render('index',
            array(
                'clubs_content' => $clubs_content,
                'previous' => false,
            )
        );
	}
}