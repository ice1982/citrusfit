<?php

class PageController extends FrontEndController
{
    public function actionIndex()
    {

    }

    public function actionView($alias = null)
    {
        $this->layout = '//templates/page';

        $this->page = $this->getPageInformation($alias);
        $this->setPageMeta($this->page);
        $this->setPageTemplate($this->page);

        $this->render('view');
    }
}