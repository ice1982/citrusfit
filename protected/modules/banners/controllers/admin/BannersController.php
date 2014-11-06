<?php

class BannersController extends BackEndController
{
    private $_model_name = 'Banner';
    private $_e_404_message = 'Запрашиваемый баннер не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Баннер удален!',
                'error_message' => 'Баннер не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Баннер успешно создан!',
                'error_message' => 'Не удалось создать баннер!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Баннер успешно изменен!',
                'error_message' => 'Не удалось изменить баннер!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
            'turnOn' => array(
                'class' => 'TurnOnAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Баннер успешно включен!',
                'error_message' => 'Не удалось включить баннер!',
                'e_404_message' => $this->_e_404_message,
            ),
            'turnOff' => array(
                'class' => 'TurnOffAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Баннер успешно выключен!',
                'error_message' => 'Не удалось выключить баннер!',
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
                'success_message' => 'Баннеры успешно отсортированы!',
                'e_404_message' => $this->_e_404_message,
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('create', 'index', 'update', 'delete', 'turnOn', 'turnOff', 'order', 'orderAjax'),
                'roles' => array(User::ROLE_GLOBAL_ADMIN, User::ROLE_GLOBAL_MANAGER),
            ),
            array('deny',
                'users' => array('?'),
            ),
        );
    }

}
