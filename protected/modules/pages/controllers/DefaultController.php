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

        if (!isset($this->page->id)) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        if (!empty($this->page->template)) {
            $this->layout = '//templates/' . $this->page->template;
        }

        $this->render('view');
    }
}