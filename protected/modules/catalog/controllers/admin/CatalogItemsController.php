<?php

class CatalogItemsController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Catalog;

		$related = Catalog::model()->active()->order()->findAll();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Catalog'])) {
			$model->attributes = $_POST['Catalog'];
			if ($model->save()) {
				$this->setSuccess('Карта создана!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Карта не создана!');
			}
		}

		$this->render('create', array(
			'model'   => $model,
			'related' => $related,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$related = Catalog::model()->active()->order()->findAll();

		$model = $this->loadModel($id);
		$model->related = explode(',', $model->related);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Catalog'])) {
			$model->attributes = $_POST['Catalog'];
			if ($model->save()) {
				$this->setSuccess('Изменения сохранены!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Изменения не сохранены!');
			}
		}

		$this->render('update', array(
			'model'   => $model,
			'related' => $related,
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
			$this->setNotice('Карта удалена!');
			$this->redirect(array('index'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Catalog('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Catalog'])) {
			$model->attributes = $_GET['Catalog'];
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
		$model = Catalog::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404, 'Запрашиваемый товар не найден.');
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

	public function actionOrder()
	{
		$this->render('order');
	}

	public function actionOrderAjax()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			Catalog::model()->saveOrder($_POST['sortable']);
		}

		$items = Catalog::model()->active()->findAll(array('order' => '`order` ASC'));

		// Load view
		$this->renderPartial('order_ajax', array('items' => $items));
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

}
