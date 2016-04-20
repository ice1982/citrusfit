<?php

class UsersController extends BackEndController
{
    private $_model_name = 'User';
    private $_e_404_message = 'Запрашиваемый пользователь не найден.';

    public function actions()
    {
        return array(
            'delete' => array(
                'class' => 'DeleteAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Пользователь удален!',
                'error_message' => 'Пользователь не удален!',
                'e_404_message' => $this->_e_404_message,
            ),
            'create' => array(
                'class' => 'CreateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Пользователь успешно создан!',
                'error_message' => 'Не удалось создать пользователя!',
            ),
            'update' => array(
                'class' => 'UpdateAction',
                'model_name' => $this->_model_name,
                'success_message' => 'Пользователь успешно изменен!',
                'error_message' => 'Не удалось изменить пользователя!',
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
                'controllers'=>array('users/admin/users'),
                'actions' => array('login', 'logout'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'index', 'update'),
                'roles' => array(User::ROLE_GLOBAL_ADMIN, User::ROLE_GLOBAL_MANAGER),
                // 'users' => array('*'),
            ),
            array('allow',
                'actions' =>array('delete'),
                'roles' => array(User::ROLE_GLOBAL_ADMIN),
            ),
            array('deny',
                'users' => array('?'),
            ),
        );
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect('/admin/');
            }
        }

        $this->layout = '//templates/login';

        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
