<?php

class DefaultController extends FrontEndController
{
	public function actionIndex($type_id = false)
	{
        $articles_model = ArticleItem::model()->findAllItemsOfType($type_id, true, true);

        if ($type_id === false) {
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