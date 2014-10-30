<?php


Yii::import('zii.widgets.CBreadcrumbs');

class MyBreadcrumbs extends CBreadcrumbs
{
    /**
     * Renders the content of the portlet.
     */
    public function run()
    {
        if (empty($this->links)) {
            return;
        }

        echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";
        $links = array();
        if ($this->homeLink === null) {
//            $links[] = CHtml::link(Yii::t('zii', 'Home'), Yii::app()->homeUrl);

            $links[] = strtr($this->activeLinkTemplate, array(
                '{url}' => CHtml::normalizeUrl(Yii::app()->homeUrl),
                '{label}' => $this->encodeLabel ? CHtml::encode(Yii::t('zii', 'Home')) : Yii::t('zii', 'Home'),
            ));

        } elseif ($this->homeLink !== false) {
//            $links[] = $this->homeLink;

            $links[] = str_replace('{label}', $this->encodeLabel ? CHtml::encode($this->homeLink) : $this->homeLink, $this->inactiveLinkTemplate);
        }

        foreach ($this->links as $label => $url) {
            if (is_string($label) || is_array($url)) {
                $links[] = strtr($this->activeLinkTemplate, array(
                    '{url}' => CHtml::normalizeUrl($url),
                    '{label}' => $this->encodeLabel ? CHtml::encode($label) : $label,
                ));
            } else {
                $links[] = str_replace('{label}', $this->encodeLabel ? CHtml::encode($url) : $url, $this->inactiveLinkTemplate);
            }
        }

        echo implode($this->separator, $links);

        echo CHtml::closeTag($this->tagName);
    }
}