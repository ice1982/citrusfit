<?php

class CatalogController extends FrontEndController
{
    public $layout = '//templates/catalog';

    public $catalog_group;
    public $catalog_description;


    public function init()
    {
        parent::init();

        $this->page = Page::model()->getPageInformationByModule('catalog');

//        var_dump($this->page);

        if (isset($this->page->id)) {
            $this->setPageMeta($this->page);
            $this->setPageTemplate($this->page);
        }
    }

    /**
     *
     */
    public function actionIndex($group = '')
    {
        if ($group == '') {
            // показываем общий каталог

            $group_model_class = CatalogGroup::model();
            $catalog_groups = $group_model_class->findAllMainGroups();

            $this->catalog_description = $this->page->begin_body;

            // view
            $this->render('index_main',
                array(
                    'catalog_groups' => $catalog_groups,
                )
            );

        } else {

            $group_id = $group;

            // получаем класс модели
            $group_model_class = CatalogGroup::model();
            // получаем конкретную модель по алиасу
            $group_model = $group_model_class->findByPk($group_id);

            $this->catalog_description = $group_model->description;

            $parents = $group_model->findAllParentGroups();

            $this->pageTitle = $group_model->setPageTitle();
            $this->breadcrumbs = $group_model->setBreadcrumbs($parents);

//            var_dump($this->breadcrumbs);


            if ($group_model->isGroupHaveChildren()) {
                // показываем список групп

                $children_groups = $group_model->findAllChildrenGroups();

                // view
                $this->render('index_groups',
                    array(
                        'group_model' => $group_model,
                        'children_groups' => $children_groups,
                    )
                );

            } else {
                // показываем таблицу товара

                $model = new CatalogItem('search');
                $model->unsetAttributes();

                if (isset($_GET['CatalogItem'])) {
                    $model->attributes = $_GET['CatalogItem'];
                }

                // view
                $this->render('index_items',
                    array(
                        'model' => $model,
                        'group_model' => $group_model,
                    )
                );
            }
        }
    }

    public function actionSearch()
    {
        if (isset($_GET['CatalogItem'])) {
            $model = new CatalogItem('search');
            $model->unsetAttributes();

            $model->attributes = $_GET['CatalogItem'];

            $this->render('search_results',
                array(
                    'model' => $model,
                )
            );
        } else {
            $this->render('search_form');
        }
    }

    public function actionRoutes()
    {


        $groups = CatalogGroup::model()->findAll();

        $data = array();
        $dump = array();
//
//        echo 1;
//
        foreach ($groups as $key => $group) {
            $data[$group->id] = new StdClass;

//            echo 1;

            $data[$group->id]->id = $group->parent_id;
            $data[$group->id]->parent_id = $group->parent_id;
            $data[$group->id]->title = $group->title;
        }

//var_dump($data);

        $parents = $this->_getParents(37, 35, $data);

        var_dump($parents);

        foreach ($parents as $key => $value) {
            var_dump($value);
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($parents));

        $result = array();

//        var_dump($iterator);

        foreach ($iterator as $key => $value) {

            if ($key == 'id') {
                $result[] = $value; // тут возвращаете как вам хочется
            }

        }

        var_dump($result);



//        echo 1;

    }

    public function _getParents($id, $parent_id, $dump)
    {
        if (empty($parent_id)) {
            $result[] = array('id' => $id, 'parent_id' => $parent_id);
        } else {

            if (count($dump) > 0) foreach ($dump as $key => $value) {
                if ($key == $parent_id) {
                    $result[] = array('id' => $id, 'parent_id' => $parent_id);
                    unset($dump[$key]);
                    $result[] = $this->_getParents($parent_id, $value->parent_id, $dump);
                }
            } else {
                $result[] = array('id' => $id, 'parent_id' => $parent_id);
            }
        }

        return $result;
    }


}