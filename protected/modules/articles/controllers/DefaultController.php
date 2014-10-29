<?php

class DefaultController extends FrontEndController
{
	public function actionIndex($type = false, $club = false)
	{
        if ($club == 'all') {
            $club_id = false;
        } else {
            $club_id = (int)$club;
        }

        $articles_model = ArticleItem::model()->findAllItemsOfType($type, $club_id, true, true);

        if ($type === false) {
            $show_group = true;
        } else {
            $show_group = false;
        }

		$this->render('index',
            array(
                'articles_model' => $articles_model,
                'show_group' => $show_group,
            )
        );
	}

    public function actionView($id)
    {
        $article_item = $this->_loadModel($id, ArticleItem::model(), true);

        $this->render('view',
            array(
                'model' => $article_item,
            )
        );
    }
}