<?php

class BaseFormWidget extends CWidget
{
    public $form_caption = 'caption';
    public $form_button = 'button';
    public $form_width = 'auto';
    public $form_height = 'auto';
    public $form_item = '';
    public $form_notice = '';

    public $type = 'default';
    public $size = 'default';


    // public $club_id = null;

    public function genegateWidgetId($string = '')
    {
        $widget_id = $string . md5(time() . rand(1, 9999999));

        return $widget_id;
    }

    public function generateClasses()
    {
        $class_array[] = 'btn modal-item-request-button fancybox-modal';
        // $class_array[] = 'btn-' . $this->type;

        switch ($this->type) {
            case 'green':
                $class_array[] = 'btn-success';
                break;
            case 'red':
                $class_array[] = 'btn-danger';
                break;
            case 'yellow':
                $class_array[] = 'btn-warning';
                break;
            case 'blue':
                $class_array[] = 'btn-primary';
                break;
            case 'link':
                $class_array[] = 'btn-link';
                break;
            default:
                $class_array[] = 'btn-default';
                break;
        }

        switch ($this->size) {
            case 'large':
                $class_array[] = 'btn-lg';
                break;
            case 'small':
                $class_array[] = 'btn-sm';
                break;
            case 'tiny':
                $class_array[] = 'btn-xs';
                break;
        }

        $class = implode(' ', $class_array);

        return $class;
    }


}