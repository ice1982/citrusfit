<?php

class DefaultController extends FrontEndController
{
	public function actionIndex($type = false, $club = false)
	{
        // Главная
        // Новости

        $group_title = false;
        $title = 'Новости сети клубов Цитрус';
        $meta_title = 'Новости сети клубов Цитрус';

        $articles_model = ArticleItem::model()->findAllItemsOfType(false, false, true, true);

        $show_group = false;

        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => $title,
        );

        if (empty($this->meta_title)) {
            $this->setPageTitle($meta_title);
        }

		$this->render('index',
            array(
                'articles_model' => $articles_model,
                'show_group' => $show_group,

                'title' => $title,
                'group_title' => $group_title,
            )
        );
	}

    public function actionView($id)
    {
        $article_item = $this->_loadModel($id, ArticleItem::model(), true);

        $this->breadcrumbs[] = array(
            'route' => Yii::app()->createUrl('articles/default/index'),
            'title' => 'Новости сети клубов Цитрус',
        );
        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => $article_item->title,
        );

        $this->setPageTitle($article_item->title);

        $this->render('view',
            array(
                'model' => $article_item,
            )
        );
    }
}