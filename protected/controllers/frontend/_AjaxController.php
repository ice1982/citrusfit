<?php

class AjaxController extends FrontEndController
{
    protected function renderArrayAsJson($array)
    {
        if ($array['status'] == 'error') {
            throw new CHttpException($array['code'], $array['message']);
        }

        echo json_encode($array);

        Yii::app()->end();
    }

    public function actionSendFromModalItemRequestForm()
    {
        $model = new ModalItemRequestForm;

        $status = array();

        if (isset($_POST['ModalItemRequestForm'])) {

            $model->attributes = $_POST['ModalItemRequestForm'];

            if ($model->validate()) {
                if ($model->send()) {
                    $status = array(
                        'status' => 'success',
                        'message' => 'Ваша заявка успешно отправлена. В самое ближайшее время с вами свяжется наш менеджер.',
                    );
                } else {
                    // TODO: Логирование ошибок!

                    $status = array(
                        'status' => 'error',
                        'message' => 'Произошла ошибка почтового сервера. Попробуйте отправить заявку еще раз.',
                        'code' => 500,
                    );
                }
            } else {
                // TODO: Логирование ошибок!
                $status = array(
                    'status' => 'error',
                    'message' => 'Произошла ошибка валидации. Попробуйте отправить заявку еще раз.',
                    'code' => 500,
                );
            }
        }

        $this->renderArrayAsJson($status);
    }

    public function actionSendFromModalItemRequestValidation()
    {
        $model = new ModalItemRequestForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modalItemRequestForm') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }



    public function actionSendFromModalPriceRequestForm()
    {
        $model = new ModalPriceRequestForm;

        $status = array();

        if (isset($_POST['ModalPriceRequestForm'])) {

            $model->attributes = $_POST['ModalPriceRequestForm'];

            if ($model->validate()) {
                if ($model->send()) {
                    $status = array(
                        'status' => 'success',
                        'message' => 'Ваша заявка на прайс-лист успешно отправлена. В самое ближайшее время наш менеджер вышлет его на вашу почту.',
                    );
                } else {
                    // TODO: Логирование ошибок!
                    $status = array(
                        'status' => 'error',
                        'message' => 'Произошла ошибка почтового сервера. Попробуйте отправить заявку еще раз.',
                        'code' => 500,
                    );
                }
            } else {
                // TODO: Логирование ошибок!
                $status = array(
                    'status' => 'error',
                    'message' => 'Произошла ошибка валидации. Попробуйте отправить заявку еще раз.',
                    'code' => 500,
                );
            }
        }

        $this->renderArrayAsJson($status);
    }

    public function actionSendFromModalPriceRequestValidation()
    {
        $model = new ModalPriceRequestForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modalPriceRequestForm') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }






    public function actionSendFromModalCallbackRequestForm()
    {
        $model = new ModalCallbackRequestForm;

        $status = array();

        if (isset($_POST['ModalCallbackRequestForm'])) {

            $model->attributes = $_POST['ModalCallbackRequestForm'];

            if ($model->validate()) {
                if ($model->send()) {
                    $status = array(
                        'status' => 'success',
                        'message' => 'Ваша заявка на прайс-лист успешно отправлена. В самое ближайшее время наш менеджер вышлет его на вашу почту.',
                    );
                } else {
                    // TODO: Логирование ошибок!
                    $status = array(
                        'status' => 'error',
                        'message' => 'Произошла ошибка почтового сервера. Попробуйте отправить заявку еще раз.',
                        'code' => 500,
                    );
                }
            } else {
                // TODO: Логирование ошибок!
                $status = array(
                    'status' => 'error',
                    'message' => 'Произошла ошибка валидации. Попробуйте отправить заявку еще раз.',
                    'code' => 500,
                );
            }
        }

        $this->renderArrayAsJson($status);
    }

    public function actionSendFromModalCallbackRequestValidation()
    {
        $model = new ModalCallbackRequestForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modalCallbackRequestForm') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }







    public function actionSendFromModalGroupRequestForm()
    {
        $model = new ModalGroupRequestForm;

        $status = array();

        if (isset($_POST['ModalGroupRequestForm'])) {

            $model->attributes = $_POST['ModalGroupRequestForm'];

            if ($model->validate()) {
                if ($model->send()) {
                    $status = array(
                        'status' => 'success',
                        'message' => 'Ваша заявка на прайс-лист успешно отправлена. В самое ближайшее время наш менеджер вышлет его на вашу почту.',
                    );
                } else {
                    // TODO: Логирование ошибок!
                    $status = array(
                        'status' => 'error',
                        'message' => 'Произошла ошибка почтового сервера. Попробуйте отправить заявку еще раз.',
                        'code' => 500,
                    );
                }
            } else {
                // TODO: Логирование ошибок!
                $status = array(
                    'status' => 'error',
                    'message' => 'Произошла ошибка валидации. Попробуйте отправить заявку еще раз.',
                    'code' => 500,
                );
            }
        }

        $this->renderArrayAsJson($status);
    }

    public function actionSendFromModalGroupRequestValidation()
    {
        $model = new ModalGroupRequestForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ModalGroupRequestForm') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


}

?>