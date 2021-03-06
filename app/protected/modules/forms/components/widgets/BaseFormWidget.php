<?php

abstract class BaseFormWidget extends CWidget
{
    /**
     * form, button_with_form, button_without_form
     * @var string
     */
    public $type;

    public $form_caption = 'form_caption';
    public $form_width = false;
    public $form_height = false;
    public $form_item = '';
    public $form_notice = '';
    public $form_class = '';

    public $form_button_text = 'button';
    public $form_button_type = 'default';
    public $form_button_size = 'default';

    public $button_text = 'button';
    public $button_href = '#';
    public $button_type = 'default';
    public $button_size = 'default';

    // Yandex.Metrika
    public $form_button_yandex_target = '';
    public $form_button_yandex_target_param = '';
    public $button_yandex_target = '';
    public $button_yandex_target_param = '';

    protected $types = array('form', 'button_with_form', 'button_without_form');

    abstract protected function _loadFormWidget();

    abstract protected function _loadButtonWithFormWidget();

    abstract protected function _loadButtonWithoutFormWidget();

    public function run()
    {
        if (!in_array($this->type, $this->types)) {
            return false;
        }

        if ($this->type == 'form') {
            $this->_loadFormWidget();
        } elseif ($this->type == 'button_with_form') {
            $this->_loadButtonWithFormWidget();
        } elseif ($this->type == 'button_without_form') {
            $this->_loadButtonWithoutFormWidget();
        }
    }

    public function genegateWidgetId($string = '')
    {
        $widget_id = $string . md5(time() . rand(1, 9999999));

        return $widget_id;
    }

    public function generateStyles()
    {
        $style = '';
        $style .= (!empty($this->form_height) ? 'height: ' . $this->form_height . 'px;' : '');
        $style .= (!empty($this->form_width) ? 'width: ' . $this->form_width . 'px' : '');

        return $style;
    }


    public function generateClasses($type, $size, $modal = false)
    {
        if ($modal == true) {
            $class_array[] = 'modal-item-request-button fancybox-modal';
        }

        $class_array[] = 'btn';

        switch ($type) {
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

        switch ($size) {
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