<?php

class DefaultController extends FrontEndController
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionView($alias = '')
    {
        $page_model = Page::model();
        $this->page = $page_model->active()->findByAlias($alias);

        if (!empty($this->page->club_id)) {
            Yii::app()->session['club'] = $this->page->club_id;
            $this->checkClubSession();
        }

        if (!isset($this->page->id)) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        $this->breadcrumbs = array(
            $this->page->title,
        );

        if (!empty($this->page->template)) {
            $this->layout = '//templates/' . $this->page->template;
        }

        $this->render('view');
    }
}