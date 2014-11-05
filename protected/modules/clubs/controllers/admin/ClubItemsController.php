<?php

class ClubItemsController extends BackEndController
{
    private $_model_name = 'ClubHall';
    private $_e_404_message = 'Запрашиваемый клуб не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Клуб удален!',
                'error_message' => 'Клуб не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Клуб успешно создан!',
                'error_message' => 'Не удалось создать клуб!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Клуб успешно изменен!',
                'error_message' => 'Не удалось изменить клуб!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Клуб успешно включен!',
                'error_message' => 'Не удалось включить клуб!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Клуб успешно выключен!',
                'error_message' => 'Не удалось выключить клуб!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }
}
