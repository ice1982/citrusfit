<?php

class CatalogItemsController extends BackEndController
{
    private $_model_name = 'CatalogItem';
    private $_e_404_message = 'Запрашиваемый товар не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товар удален!',
                'error_message' => 'Товар не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товар успешно создан!',
                'error_message' => 'Не удалось создать товар!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товар успешно изменен!',
                'error_message' => 'Не удалось изменить товар!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товар успешно включен!',
                'error_message' => 'Не удалось включить товар!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товар успешно выключен!',
                'error_message' => 'Не удалось выключить товар!',
                'e_404_message' => $this->_e_404_message,
            ),
            'order' => array(
                'class' => 'OrderAction',
                'model_name' => $this->_model_name,
                'e_404_message' => $this->_e_404_message,
            ),
            'orderAjax' => array(
                'class' => 'OrderAjaxAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Товары успешно отсортированы!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }

}
