<?php

Yii::import('application.modules.articles.models.*');

class NewsBlockWidget extends CWidget
{
    public function run()
    {
        $all_clubs_model = ArticleItem::model()->active()->findAll(array('order' => 'id DESC', 'limit' => 4));

        $this->render('newsBlockWidget', array(
            'all_clubs_model' => $all_clubs_model,
        ));
    }

}