<?php

class DefaultController extends FrontEndController
{
    public function actionView($alias = '')
    {
        $page_model = Page::model();
        $this->page = $page_model->active()->findByAlias($alias);

        $this->setPageMeta($this->page);
        $this->setPageTemplate($this->page);

        // if (!empty($this->page->club_id)) {
        //     Yii::app()->session['club'] = $this->page->club_id;
        //     $this->checkClubSession();
        // }

        if (!isset($this->page->id)) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => $this->page->title,
        );

        if (!empty($this->page->template)) {
            $this->layout = '//templates/' . $this->page->template;
        }

        $this->render('view');
    }

    // public function getPageLastUpdate($page_alias)
    // {
    //     $last_modified = array();

    //     $last_modified[] = Page::model()->findLastModifiedDateByAttributes(array('alias' => $page_alias));
    //     $last_modified[] = Banner::model()->findLastModifiedDate();
    //     $last_modified[] = Block::model()->findCommonLastModifiedDate();

    //     $this->setMaxLastModified($last_modified);
    // }

}