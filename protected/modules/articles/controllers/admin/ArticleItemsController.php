<?php

class ArticlesItemsController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Article;

		$this->performAjaxValidation($model);

		if (isset($_POST['Article'])) {
			$model->attributes = $_POST['Article'];
			if ($model->save()) {
				$this->setSuccess('Статья создана!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Статья не создана!');
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
		$image = $model->image;

		$this->performAjaxValidation($model);

		if (isset($_POST['Article'])) {
			$model->attributes = $_POST['Article'];
			if (empty($model->image)) {
				$model->image = $image;
			}
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
			$this->setNotice('Статья удалена!');
			$this->redirect(array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Article('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Article'])) {
			$model->attributes = $_GET['Article'];
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

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Article::model()->of_club()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'Запрашиваемая публикация не найдена.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'article-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
