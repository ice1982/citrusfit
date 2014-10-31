<?php

class CatalogGroupsController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new CatalogGroup;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['CatalogGroup'])) {
			$model->attributes = $_POST['CatalogGroup'];
			if ($model->save()) {
				$this->setSuccess('Группа создана!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Группа не создана!');
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

		if(isset($_POST['CatalogGroup'])) {
			$model->attributes = $_POST['CatalogGroup'];
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
			$this->setNotice('Группа удалена!');
			$this->redirect(array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new CatalogGroup('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['CatalogGroup'])) {
			$model->attributes = $_GET['CatalogGroup'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Catalog the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = CatalogGroup::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404, 'Запрашиваемая группа не найден.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Catalog $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'catalog-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
