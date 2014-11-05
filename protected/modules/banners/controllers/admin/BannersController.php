<?php

class BannersController extends BackEndController
{
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Banner;

        // $this->performAjaxValidation($model);

        if (isset($_POST['Banner'])) {
            $model->attributes = $_POST['Banner'];

            if ($model->save()) {
                $this->setSuccess('Баннер создан!');
                $this->redirect(array('index'));
            } else {
                $this->setError('Баннер не создан!');
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // $this->performAjaxValidation($model);

        if (isset($_POST['Banner'])) {
            $model->attributes = $_POST['Banner'];
            if ($model->save()) {
                $this->setSuccess('Изменения сохранены!');
                $this->redirect(array('index'));
            } else {
                $this->setError('Изменения не сохранены!');
            }
        }

        $this->render('update',array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->setNotice('Баннер удален!');
            $this->redirect(array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Banner('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Banner'])) {
            $model->attributes = $_GET['Banner'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionTurnOn($id)
    {
        $this->loadModel($id)->updateByPk($id, array('active' => 1));
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionTurnOff($id)
    {
        $this->loadModel($id)->updateByPk($id, array('active' => 0));
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    public function actionOrder()
    {
        $this->render('order');
    }

    public function actionOrderAjax()
    {
        $object = Banner::model();

        // Save order from ajax call
        if (isset($_POST['sortable'])) {
            $object->saveOrder($_POST['sortable']);
        }

        $items = $object->findAll(array('order' => '`nn` ASC'));

        // Load view
        $this->renderPartial('order_ajax', array('items' => $items));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Banner the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Banner::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемый баннер не найден.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Banner $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
