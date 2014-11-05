<?php

class ArticleTypesController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new ArticleType;

		// $this->performAjaxValidation($model);

		if (isset($_POST['ArticleType'])) {
			$model->attributes = $_POST['ArticleType'];
			if ($model->save()) {
				$this->setSuccess('Тип создан!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Тип не создан!');
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

		if (isset($_POST['ArticleType'])) {
			$model->attributes = $_POST['ArticleType'];
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
			$this->setNotice('Тип удален!');
			$this->redirect(array('index'));
		}

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new ArticleType('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['ArticleType'])) {
			$model->attributes = $_GET['ArticleType'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ArticleType the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = ArticleType::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'Запрашиваемый тип публикации не найден.');
		}

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ArticleType $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'article-type-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
