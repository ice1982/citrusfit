<?php

class DefaultController extends FrontEndController
{
	public function actionIndex($type = false, $club = false)
	{
        // Главная
        // Новости

        $group_title = false;
        $title = 'Новости сети клубов &laquo;Цитрус&raquo;';
        $meta_title = 'Новости сети клубов Цитрус';

        if (($club == 'all') || ($club == false)) {
            $club_id = false;
        } else {
            $club_id = (int)$club;

            $club_model = ClubItem::model()->active()->findByPk($club_id);
            if (isset($club_model->id)) {
                $title = 'Новости клуба &laquo;' . $club_model->title . '&raquo;';
                $meta_title = 'Новости клуба ' . $club_model->title;
            }
        }

        $articles_model = ArticleItem::model()->findAllItemsOfType($type, $club_id, true, true);

        if ($type === false) {
            $show_group = true;
        } else {
            $show_group = false;
            $group_title = ArticleType::model()->findByPk($type)->title;
        }

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
            'title' => 'Новости сети клубов &laquo;Цитрус&raquo;',
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