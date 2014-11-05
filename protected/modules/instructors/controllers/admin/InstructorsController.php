<?php

class InstructorsController extends BackEndController
{
    private $_model_name = 'InstructorItem';
    private $_e_404_message = 'Запрашиваемый инструктор не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Инструктор удален!',
                'error_message' => 'Инструктор не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Инструктор успешно создан!',
                'error_message' => 'Не удалось создать инструктора!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Инструктор успешно изменен!',
                'error_message' => 'Не удалось изменить инструктора!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Инструктор успешно включен!',
                'error_message' => 'Не удалось включить инструктора!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Инструктор успешно выключен!',
                'error_message' => 'Не удалось выключить инструктора!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }
}
