<?php

class ArticleTypesController extends BackEndController
{
    private $_model_name = 'ArticleType';
    private $_e_404_message = 'Запрашиваемый тип статьи не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Группа статей удалена!',
                'error_message' => 'Группа статей не удалена!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Группа статей успешно создана!',
                'error_message' => 'Не удалось создать группу статей!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Группа статей успешно изменена!',
                'error_message' => 'Не удалось изменить группу статей!',
                'e_404_message' => $this->_e_404_message,
            ),
            'index' => array(
                'class' => 'IndexAction',
                'model_name' => $this->_model_name,
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('create', 'index', 'update', 'delete'),
                'roles' => array(User::ROLE_GLOBAL_ADMIN, User::ROLE_GLOBAL_MANAGER),
            ),
            array('deny',
                'users' => array('?'),
            ),
        );
    }
}
