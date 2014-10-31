<?php

class BlocksController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Block;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$model->attributes = $_POST['Block'];
			if ($model->save()) {
				$this->setSuccess('Блок создан!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Блок не создан!');
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

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$model->attributes = $_POST['Block'];
			if ($model->save()) {
				$this->setSuccess('Изменения сохранены!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Изменения не сохранены!');
			}
		}

		$this->render('update', array(
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
			$this->setNotice('Блок удален!');
			$this->redirect(array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Block('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Block'])) {
			$model->attributes = $_GET['Block'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Block the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Block::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'Запрашиваемый блок не существует.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Block $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'block-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
