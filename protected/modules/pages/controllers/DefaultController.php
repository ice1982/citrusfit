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

        $this->layout = '//templates/homepage';

        $this->render('view', array(
                'page_content' => $page_content,
            )
        );
    }
}