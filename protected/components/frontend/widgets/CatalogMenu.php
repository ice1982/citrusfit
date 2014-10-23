<?php

class CatalogMenu extends CWidget
{
    public function run()
    {
        $groups_model = CatalogGroup::model()->findAll();

        $level_1 = array();

        foreach ($groups_model as $group_model) {


            if (empty($group_model->parent_id)) {
                $level_1[$group_model->id] = $group_model;
            } elseif (empty($group_model->parent->parent_id)) {
                $level_2[$group_model->parent->id][] = $group_model;


            }

        }

//        var_dump($level_1);
//        var_dump($level_2);

        $this->render('catalogMenu', array(
            'level_1' => $level_1,
            'level_2' => $level_2,
        ));
    }

}