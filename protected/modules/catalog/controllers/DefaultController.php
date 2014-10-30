<?php

class DefaultController extends FrontEndController
{
	public function actionIndex()
	{
        if (empty(Yii::app()->session['club'])) {
            // Выбор клуба
            $club_model = ClubItem::model();
            $clubs_content = $club_model->active()->findAll();

            // Главная
            // Выбор клуба
            $this->breadcrumbs = array(
                'Выбор клуба для показа каталога',
            );

            $this->render('application.modules.clubs.views.default.index',
                array(
                    'clubs_content' => $clubs_content,
                    'previous' => true,
                )
            );
        } else {
            $club_id = Yii::app()->session['club'];

            $catalog_item_models = CatalogItem::model()->findAllItemsOfClub($club_id);
            foreach ($catalog_item_models as $catalog_item_model) {
                $catalog_items_content[$catalog_item_model->group_id][] = $catalog_item_model;
            }

            $catalog_group_models = CatalogGroup::model()->active()->findAll();

            // Главная
            // Сеть Цитрус
            // Клуб
            // Клубные карты
            $this->breadcrumbs = array(
                'Сеть клубов &laquo;Цитрус&raquo;' => Yii::app()->createUrl('clubs/default/index'),
                'Клуб &laquo;' . $this->club->title . '&raquo;' => Yii::app()->createUrl('clubs/default/view', array('id' => $club_id)),
                'Клубные карты и абонементы',
            );

            $this->render('index',
                array(
                    'catalog_items_content' => $catalog_items_content,
                    'catalog_group_models' => $catalog_group_models,
                )
            );
        }

	}

    public function actionView($id)
    {
        $catalog_item = $this->_loadModel($id, CatalogItem::model(), true);

        // Главная
        // Сеть Цитрус
        // Клуб
        // Клубные карты
        // Карта
        $this->breadcrumbs['Сеть клубов &laquo;Цитрус&raquo;'] = Yii::app()->createUrl('clubs/default/index');
        if (isset($catalog_item->club->id)) {
            $this->breadcrumbs['Клуб &laquo;' . $catalog_item->club->title . '&raquo;'] = Yii::app()->createUrl('clubs/default/view', array('id' => $catalog_item->club_id));
        } elseif (!empty(Yii::app()->session['club'])) {
            $club_id = Yii::app()->session['club'];
            $club_model = ClubItem::model()->active()->findByPk($club_id);

            $this->breadcrumbs['Клуб &laquo;' . $club_model->title . '&raquo;'] = Yii::app()->createUrl('clubs/default/view', array('id' => $club_id));
        }
        $this->breadcrumbs['Клубные карты и абонементы'] = Yii::app()->createUrl('catalog/default/index');
        $this->breadcrumbs[] = $catalog_item->title;

        $this->render('view',
            array(
                'catalog_item' => $catalog_item,
            )
        );
    }
}