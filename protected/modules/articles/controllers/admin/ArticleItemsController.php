<?php

class ArticleItemsController extends BackEndController
{
    private $_model_name = 'ArticleItem';
    private $_e_404_message = 'Запрашиваемая статья не найдена.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Статья удалена!',
                'error_message' => 'Статья не удалена!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Статья успешно создана!',
                'error_message' => 'Не удалось создать статью!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Статья успешно изменена!',
                'error_message' => 'Не удалось изменить статью!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Статья успешно включена!',
                'error_message' => 'Не удалось включить статью!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Статья успешно выключена!',
                'error_message' => 'Не удалось выключить статью!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }
}
