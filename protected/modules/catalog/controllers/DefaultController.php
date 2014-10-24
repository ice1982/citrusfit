<?php

class DefaultController extends FrontEndController
{
	public function actionIndex()
	{
        // Yii::app()->session['club'] = 0;

        if (empty(Yii::app()->session['club'])) {
            // Выбор клуба
            $club_model = ClubItem::model();
            $clubs_content = $club_model->active()->findAll();

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

            $this->render('index',
                array(
                    'catalog_items_content' => $catalog_items_content,
                    'catalog_group_models' => $catalog_group_models,
                )
            );
        }

	}
}