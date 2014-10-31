<?php

class InstructorsController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$clubs = Club::model()->active()->findAll();
		$tags = Tag::model()->findAll();

		$model = new Instructor;

		$this->performAjaxValidation($model);

		if (isset($_POST['Instructor'])) {
			$model->attributes = $_POST['Instructor'];
			if ($model->save()) {
				$this->redirect(array('index'));
			}
		}

		$this->render('create', array(
			'clubs' => $clubs,
			'model' => $model,
			'tags' => $tags,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$clubs = Club::model()->active()->findAll();
		$tags = Tag::model()->findAll();

		$model = $this->loadModel($id);
		$image = $model->image;
		$model->clubs = explode(',', $model->clubs);

		$this->performAjaxValidation($model);

		if (isset($_POST['Instructor'])) {
			$model->attributes = $_POST['Instructor'];
			if (empty($model->image)) {
				$model->image = $image;
			}
			if ($model->save()) {
				$this->redirect(array('index'));
			}
		}
		$this->render('update', array(
			'clubs' => $clubs,
			'model' => $model,
			'tags' => $tags,
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Instructor('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Instructor'])) {
			$model->attributes = $_GET['Instructor'];
		}

		$this->render('index',array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Instructor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Instructor::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Instructor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'instructor-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
