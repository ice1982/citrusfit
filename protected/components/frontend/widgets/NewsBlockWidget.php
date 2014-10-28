<?php

Yii::import('application.modules.articles.models.*');

class NewsBlockWidget extends CWidget
{
    public function run()
    {
        $club_id = Yii::app()->session['club'];

        if (empty($club_id)) {
            $all_clubs_model = ArticleItem::model()->active()->findAll(array('order' => 'pubdate DESC', 'limit' => 10));

            $this->render('newsBlockWidget', array(
                'all_clubs_model' => $all_clubs_model,
            ));
        } else {
            $club_model = ClubItem::model()->findByPk($club_id);

            $all_clubs_model = ArticleItem::model()->active()->findAll(array('order' => 'pubdate DESC', 'limit' => 5));
            $clubs_model = ArticleItem::model()->active()->findAllByAttributes(array('club_id' => $club_id), array('order' => 'pubdate DESC', 'limit' => 5));

            $this->render('newsBlockChoosenWidget', array(
                'all_clubs_model' => $all_clubs_model,
                'club_model' => $club_model,
                'clubs_model' => $clubs_model,
            ));
        }
    }

}