<?php

class DefaultController extends FrontEndController
{
	public function actionIndex()
	{
        $catalog_item_models = CatalogItem::model()->findAll();

        foreach ($catalog_item_models as $catalog_item_model) {
            $catalog_items_content[$catalog_item_model->group_id][] = $catalog_item_model;
        }

        $catalog_group_models = CatalogGroup::model()->active()->findAll();

        $this->breadcrumbs[] = array(
            'route' => false,
            'title' => 'Клубные карты и абонементы',
        );

        $this->setPageTitle('Клубные карты и абонементы');

        $this->render('index',
            array(
                'catalog_items_content' => $catalog_items_content,
                'catalog_group_models' => $catalog_group_models,
            )
        );
	}

    public function actionView($id)
    {
        $catalog_item = $this->_loadModel($id, CatalogItem::model(), true);

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