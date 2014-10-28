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
        $page_content = $page_model->active()->findByAlias($alias);

        if (!isset($page_content->id)) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        if (!empty($page_content->template)) {
            $this->layout = '//templates/' . $page_content->template;
        }

        $this->render('view', array(
                'page_content' => $page_content,
            )
        );
    }
}