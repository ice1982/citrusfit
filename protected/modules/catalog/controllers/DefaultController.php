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

            $this->breadcrumbs[] = array(
                'route' => false,
                'title' => 'Выбор клуба для показа каталога',
            );

            if (empty($this->meta_title)) {
                $this->setPageTitle('Выбор клуба для показа каталога');
            }

            $this->render('application.modules.clubs.views.default.index',
                array(
                    'clubs_content' => $clubs_content,
                    'previous' => true,
                )
            );
        } else {
            $club_id = Yii::app()->session['club'];

            // $catalog_item_models = CatalogItem::model()->findAllItemsOfClub($club_id);
            $catalog_item_models = CatalogItem::model()->findAllItemsOfClubJson($club_id);

            foreach ($catalog_item_models as $catalog_item_model) {
                $catalog_items_content[$catalog_item_model->group_id][] = $catalog_item_model;
            }

            $catalog_group_models = CatalogGroup::model()->active()->findAll();

            // Главная
            // Сеть Цитрус
            // Клуб
            // Клубные карты
            $this->breadcrumbs[] = array(
                'route' => Yii::app()->createUrl('clubs/default/index'),
                'title' => 'Сеть клубов &laquo;Цитрус&raquo;',
            );
            $this->breadcrumbs[] = array(
                'route' => Yii::app()->createUrl('clubs/default/view', array('id' => $club_id)),
                'title' => 'Клуб &laquo;' . $this->club->title . '&raquo;',
            );
            $this->breadcrumbs[] = array(
                'route' => false,
                'title' => 'Клубные карты и абонементы',
            );


            $this->setPageTitle('Клубные карты и абонементы | ' . 'Клуб ' . $this->club->title . '');


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

        $this->breadcrumbs[] = array(
            'route' => Yii::app()->createUrl('clubs/default/index'),
            'title' => 'Сеть клубов &laquo;Цитрус&raquo;',
        );

        if (isset($this->club->id)) {
            $this->breadcrumbs[] = array(
                'route' => Yii::app()->createUrl('clubs/default/view', array('id' => $this->club->id)),
                'title' => 'Клуб &laquo;' . $this->club->title . '&raquo;',
            );
        } elseif (!empty(Yii::app()->session['club'])) {
            $club_id = Yii::app()->session['club'];
            $club_model = ClubItem::model()->active()->findByPk($club_id);

            $this->breadcrumbs[] = array(
                'route' => Yii::app()->createUrl('clubs/default/view', array('id' => $club_id)),
                'title' => 'Клуб &laquo;' . $club_model->title . '&raquo;',
            );
        }

        $this->breadcrumbs[] = array(
            'route' => Yii::app()->createUrl('catalog/default/index'),
            'title' => 'Клубные карты и абонементы',
        );
        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => $catalog_item->title,
        );

        $this->setPageTitle($catalog_item->title);

        $this->render('view',
            array(
                'catalog_item' => $catalog_item,
            )
        );
    }
}