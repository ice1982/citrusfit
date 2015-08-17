<?php

class FrontEndController extends BaseController
{
    public $layout = '//templates/default';
    public $page;
    public $pageIndex = 1;
    public $meta_title;
    public $pageDescription;
    public $pageKeywords;
    public $pageTemplate;

    public $breadcrumbs;

    public $club;

    public function init()
    {
        // $this->trailingSlashRedirect();

        parent::init();

        $this->checkClubSession();

        if (isset(Yii::app()->controller->module->page)) {
            $page = Yii::app()->controller->module->page;
        }

        if (isset($page->id)) {
            $this->page = Yii::app()->controller->module->page;

            $this->setPageMeta($this->page);
            $this->setPageTemplate($this->page);
        }

        $this->_generateWidgetsList();


        if (!empty($this->page->club_id)) {
            Yii::app()->session['club'] = $this->page->club_id;
            $this->checkClubSession();
        }

        $this->_launchUtmHandler();

    }

    private function _launchUtmHandler()
    {
        if (isset($_GET)) {
            // var_dump($_GET);
            $json_get_array = json_encode($_GET);
            // var_dump($json_get_array);
        }
        if (!isset(Yii::app()->session['utm_session'])) {
            if ( (isset($json_get_array)) && (isset($_SERVER['HTTP_REFERER'])) ) {
                $session = new CHttpSession;
                $session->open();
                $session->setTimeout(0);

                $session['utm_session'] = $json_get_array;
            }
        } else {
            // var_dump(Yii::app()->session['utm_session']);
        }
    }

    private function _generateWidgetsLocations()
    {
        $locations[] = 'application.components.frontend.widgets';
        $modules = $this->_getModulesNames();

        foreach ($modules as $module) {
            $locations[] = 'application.modules.' . $module . '.components.widgets';
        }

        return $locations;
    }

    private function _generateWidgetsList()
    {
        $locations = $this->_generateWidgetsLocations();

        $list = array();

        foreach ($locations as $directory) {
            $path = Yii::getPathOfAlias($directory);

            if (is_dir($path)) {
                $files = CFileHelper::findFiles($path, array('fileTypes' => array('php'), 'level' => 0));

                if (count($files)) {
                    foreach ($files as $file) {
                        $list[] = basename($file, '.php');
                    }
                }
            }
        }

        return $list;
    }

    public function checkClubSession()
    {
        $club_id = Yii::app()->request->getQuery('club_id');

        if (empty($club_id)) {
            $club_id = Yii::app()->session['club'];
        } elseif ($club_id == 'all') {
            $club_id = false;
            Yii::app()->session['club'] = false;
        }

        // var_dump($club_id);

        $club_model = ClubItem::model();

        if (!empty($club_id)) {
            $this->club = $club_model->active()->findByPk($club_id);

            if (!isset($this->club->id)) {
                $this->club = $club_model->findByPk(-1);
            }
        } else {
            $this->club = $club_model->findByPk(-1);
        }

        // var_dump($this->club);
    }

    public function behaviors()
    {
        return array(
            'InlineCommonWidgetsBehavior' => array(
                'class' => 'MyInlineWidgetsBehavior',
                'location' => $this->_generateWidgetsLocations(),
                'startBlock' => '{{w:',
                'endBlock' => '}}',
                'widgets' => $this->_generateWidgetsList(),
            ),

        );
    }

    protected function getPageInformation($alias)
    {
        $page_model = Page::model()->findByAlias($alias);

        if (isset($page_model->id)) {
            return $page_model;
        } else {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }
    }

    protected function setPageMeta($page)
    {
        $meta_title = '';

        $homepage = Page::model()->findByAlias('');
        if (!isset($page->id)) {
            $page = $homepage;
        }

        if (empty($page->meta_title)) {
            $meta_title = $homepage->meta_title;
        } else {
            $meta_title = $page->meta_title;
        }

        $meta_description = $homepage->meta_description;
        $meta_keywords = $homepage->meta_keywords;

        if (empty($meta_title)) {
            $meta_title = Yii::app()->name;
        }

        $this->meta_title = $meta_title;

        $meta_description = (!empty($meta_description)) ? $meta_description : $homepage->meta_description;
        $meta_keywords = (!empty($meta_keywords)) ? $meta_keywords : $homepage->meta_keywords;

        $this->setPageTitle($meta_title);

        $this->pageDescription = $meta_description;
        $this->pageKeywords = $meta_keywords;
        $this->pageIndex = $homepage->meta_index;
    }


    protected function setPageTemplate($page)
    {
        if (!empty($page->template)) {
            $this->layout = '//templates/' . $page->template;
        }
    }

    public function loadBlockBody($alias)
    {
        $block_model = Block::model()->findByAlias($alias);

        if (isset($block_model->body)) {
            return $block_model->body;
        }
    }

    protected function _loadModel($id, $object, $active = false)
    {
        if ($active) {
            $model = $object->active()->findByPk($id);
        } else {
            $model = $object->findByPk($id);
        }

        if (isset($model->id)) {
            return $model;
        } else {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }
    }

    protected function trailingSlashRedirect()
    {
        if (Yii::app()->request->isAjaxRequest) {
            return false;
        }

        // Remove any double slashes and force a trailing slash to the request URI

        $requestUri = yii::app()->request->requestUri;

        if (true === strpos($requestUri, '.')) {

        }

        $repairedRequestUri = $requestUri;

        while (false !== strpos($repairedRequestUri, '//')) {
            $repairedRequestUri = preg_replace("////", '/', $repairedRequestUri);
        }

        if (
            false === strpos($repairedRequestUri, '?') &&
            '/' !== substr($repairedRequestUri, strlen($repairedRequestUri) - 1, 1)
        ) {
            $repairedRequestUri = "{$repairedRequestUri}/";
        } elseif ('/' !== substr($repairedRequestUri, strpos($repairedRequestUri, '?') - 1, 1)) {
            $repairedRequestUri = substr($repairedRequestUri, 0, strpos($repairedRequestUri, '?')) . '/' . substr($repairedRequestUri, strpos($repairedRequestUri, '?'));
        }

        if ( (false === strpos($repairedRequestUri, '.')) && ($repairedRequestUri !== $requestUri) ) {
            Yii::app()->request->redirect($repairedRequestUri, true, 301);
        }
    }


}
