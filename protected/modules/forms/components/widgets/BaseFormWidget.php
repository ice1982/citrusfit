<?php

class BaseFormWidget extends CWidget
{
    public $form_caption = 'caption';
    public $form_button = 'button';
    public $form_width = 'auto';
    public $form_height = 'auto';
    public $form_item = '';
    public $form_notice = '';

    public function genegateWidgetId($string = '')
    {
        $widget_id = $string . md5(time() . rand(1, 9999999));

        return $widget_id;
    }
}