<?php

class SearchPopupFormWidget extends CWidget
{
    public function run()
    {
        $item_model = new CatalogItem;

        if (isset($_GET['CatalogItem'])) {
            $item_model->attributes = $_GET['CatalogItem'];
        }

        $groups = CatalogGroup::model()->buildGroupTree();

        $this->render('searchPopupFormWidget',
            array(
                'model' => $item_model,
                'groups' => $groups,
            )
        );
    }

} 