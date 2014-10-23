<?php

class SiteController extends FrontEndController
{


    // public function actionIndex()
    // {
    //     $this->render(
    //         'index'
    //     );
    // }

    public function init()
    {

    }

    public function actionIndex($alias = '')
    {
//        $alias = (string) CHelper::segment(1);

        $this->page = Page::model()->findByAttributes(array('alias' => $alias));

        if ($this->page === null) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        $method = '';
        if (!empty($this->page->module)) {
            $method = '_' . $this->page->module;
        }

        if (method_exists($this, $method)) {
            $this->$method($alias);
        } else {
            $this->_page($alias);
        }
    }


    private function _catalog($page_slug = false)
    {
        $type_alias = (string) CHelper::segment(2);
        $group_alias = (string) CHelper::segment(3);

//         var_dump($type_alias);
//         var_dump($group_alias);

        // $item_slug  = (string) CHelper::segment(3);

        // показываем все типы продукции
        if (empty($group_alias)) {
            $this->launchController('/catalog/indexMain/type_alias/' . $type_alias, true, array('page' => $this->page));
        } else {
            $this->launchController('/catalog/indexList/type_alias/' . $type_alias . '/group_alias/' . $group_alias, true, array('page' => $this->page));
        }



        // if (empty($group_slug)) {
        //     // показываем общий список
        //     $this->forward('/catalog/commonIndex/page_slug/' . $page_slug);
        // } elseif (empty($item_slug)) {
        //     // показываем список группы
        //     $this->forward('/catalog/groupIndex/page_slug/' . $page_slug . '/group_slug/' . $group_slug);
        // } else {
        //     // показываем товар
        //     $this->forward('/catalog/view/page_slug/' . $page_slug . '/group_slug/' . $group_slug . '/item_slug/' . $item_slug);
        // }
    }


    private function _page($alias = false)
    {
        $this->launchController('/page/view/page_alias/' . $alias, true, array('page' => $this->page));
    }


}