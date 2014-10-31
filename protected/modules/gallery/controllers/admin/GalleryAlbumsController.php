<?php

class GalleryAlbumsController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new GalleryAlbum;
		$this->performAjaxValidation($model);

		if (isset($_POST['GalleryAlbum'])) {
			$model->attributes = $_POST['GalleryAlbum'];
			if ($model->save()) {
				$this->redirect(array('index'));
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
		$this->performAjaxValidation($model);

		if (isset($_POST['GalleryAlbum'])) {
			$model->attributes = $_POST['GalleryAlbum'];
			if ($model->save()) {
				$this->redirect(array('index'));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new GalleryAlbum('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['GalleryAlbum'])) {
			$model->attributes = $_GET['GalleryAlbum'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GalleryAlbum the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = GalleryAlbum::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GalleryAlbum $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'gallery-album-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
