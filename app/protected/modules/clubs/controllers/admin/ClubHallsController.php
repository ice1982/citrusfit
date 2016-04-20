<?php

class ClubHallsController extends BackEndController
{
    private $_model_name = 'ClubHall';
    private $_e_404_message = 'Запрашиваемый зал не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Зал удален!',
                'error_message' => 'Зал не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Зал успешно создан!',
                'error_message' => 'Не удалось создать зал!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Зал успешно изменен!',
                'error_message' => 'Не удалось изменить зал!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Зал успешно включен!',
                'error_message' => 'Не удалось включить зал!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Зал успешно выключен!',
                'error_message' => 'Не удалось выключить зал!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('create', 'index', 'update', 'delete', 'turnOn', 'turnOff'),
                'roles' => array(User::ROLE_GLOBAL_ADMIN, User::ROLE_GLOBAL_MANAGER),
            ),
            array('deny',
                'users' => array('?'),
            ),
        );
    }
}
