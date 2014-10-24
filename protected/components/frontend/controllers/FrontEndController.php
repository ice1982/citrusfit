<?php
class FrontEndController extends BaseController
{
    public $layout = '//templates/default';
    public $page;
    public $pageIndex = 1;
    public $pageDescription;
    public $pageKeywords;
    public $pageTemplate;

    public $breadcrumbs;

    public function init()
    {
        parent::init();

        Yii::import('application.modules.blocks.*');
        Yii::import('application.modules.blocks.models.*');
        Yii::import('application.modules.blocks.models._forms.*');
        Yii::import('application.modules.blocks.models._base.*');

        Yii::import('application.modules.clubs.*');
        Yii::import('application.modules.clubs.models.*');
        Yii::import('application.modules.clubs.models._forms.*');
        Yii::import('application.modules.clubs.models._base.*');
    }

    public function checkClubSession()
    {

    }

    public function behaviors()
    {
        return array(
            'InlineWidgetsBehavior' => array(
                'class' => 'DInlineWidgetsBehavior',
                'location' => 'application.components.frontend.widgets',
                'startBlock' => '{{w:',
                'endBlock' => '}}',
                'widgets' => array(
                    'GalleryBlock',
                    'CurrentYear',
                    'HomeUrl',
                    'MainMenu',
                    'SpecialBlock',

                    'ModalCallbackRequestFormWidget',
                    'ModalPriceRequestFormWidget',
                    'ModalGroupRequestFormWidget',
                ),
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
        $this->pageIndex = $page->meta_index;
        (empty($page->meta_title)) || $this->setPageTitle($page->meta_title);
        (empty($page->meta_keywords)) || $this->pageKeywords = $page->meta_keywords;
        (empty($page->meta_description)) || $this->pageDescription = $page->meta_description;

        if ((empty($this->pageKeywords)) || (empty($this->pageDescription))) {

            if (empty($page->alias)) {
                $homepage = $page;
            } else {
                $homepage = Page::model()->findByAlias(null);
            }

            if ((empty($this->pageKeywords))) {
                $this->pageKeywords = $homepage->meta_keywords;
            }

            if ((empty($this->pageDescription))) {
                $this->pageDescription = $homepage->meta_description;
            }
        }
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
}
