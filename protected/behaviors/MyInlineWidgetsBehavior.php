<?php
class MyInlineWidgetsBehavior extends DInlineWidgetsBehavior
{
    /**
     * @var mixed alias if needle using default location 'path.to.widgets'
     */
    public $location = '';

    protected function _loadWidget($name, $attributes='')
    {
        $attrs = $this->_parseAttributes($attributes);
        $cache = $this->_extractCacheExpireTime($attrs);

        $index = 'widget_' . $name . '_' . serialize($attrs);

        if ($cache && $cachedHtml = Yii::app()->cache->get($index))
        {
            $html = $cachedHtml;
        }
        else
        {
            ob_start();
            $widgetClass = $this->_getFullClassName($name);

            $path = Yii::getpathOfAlias($widgetClass);
            if (!file_exists($path . '.php')) {
                return false;
            }

            $widget = Yii::app()->getWidgetFactory()->createWidget($this->owner, $widgetClass, $attrs);
            $widget->init();
            $widget->run();
            $html = trim(ob_get_clean());
            // Yii::app()->cache->set($index, $html, $cache);
        }

        return $html;
    }

    protected function _getFullClassName($name)
    {
        $widgetClass = $name . $this->classSuffix;

        if (!is_array($this->location)) {
            $locations[] = $this->location;
        } else {
            $locations = $this->location;
        }

        foreach ($locations as $location) {
            if ($this->_getClassByAlias($widgetClass) == $widgetClass && $location) {
                $widgetClassWithLocation = $location . '.' . $widgetClass;
            }

            $path = Yii::getpathOfAlias($widgetClassWithLocation);

            if (!file_exists($path . '.php')) {
                continue;
            } else {
                return $widgetClassWithLocation;
            }
        }

        return $widgetClassWithLocation;
    }
}