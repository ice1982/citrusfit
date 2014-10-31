<?php

Yii::import('application.modules.instructors.*');
Yii::import('application.modules.instructors.models.*');
Yii::import('application.modules.instructors.models._forms.*');
Yii::import('application.modules.instructors.models._base.*');

class TimeboardController extends BackEndController
{
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new TimeboardItem;

		// $this->performAjaxValidation($model);

		if (isset($_POST['TimeboardItem'])) {
			$model->attributes = $_POST['TimeboardItem'];
			if ($model->save()) {
				$this->setSuccess('Занятие создано!');
				$this->redirect(array('index&hall_id=' . $model->hall_id));
			} else {
				$this->setError('Занятие не создано!');
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
		$model=$this->loadModel($id);

		// $this->performAjaxValidation($model);

		if (isset($_POST['TimeboardItem'])) {
			$model->attributes=$_POST['TimeboardItem'];
			if ($model->save()) {
				$this->setSuccess('Изменения сохранены!');
				$this->redirect(array('index&hall_id=' . $model->hall_id));
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
			$this->setNotice('Занятие удалено!');
			$this->redirect(array('index'));
		}
	}

    public function actionIndex($club_id = false)
    {
        if ($club_id == false) {
            // Выбор клуба
            $club_model = ClubItem::model();
            $clubs_content = $club_model->active()->findAll();

            $this->breadcrumbs = array(
                'Выбор клуба для показа расписания',
            );

            $this->render('select_club',
                array(
                    'clubs_content' => $clubs_content,
                )
            );
        } else {
            $club = ClubItem::model()->findByPk($club_id);

            $workouts = TimeboardItem::model()->findAllItemsOfClub($club_id);
            foreach ($workouts as $workout) {
                $dump[$workout->hall->id][$workout->time_start][$workout->day_of_week] = $workout;
            }

             $this->breadcrumbs = array(
                 'Клуб &laquo;' . $club->title . '&raquo;' => Yii::app()->createUrl('timeboard/admin/timeboard/index'),
                 'Расписание',
             );

            $this->render('index', array(
                'club' => $club,
                'dump' => $dump,
            ));
        }
    }

	public function actionExport($club_id)
	{
		$halls_array = array();
		$halls = TimeboardItem::model()->findAllByAttributes(array('club_id' => $club_id), array('order' => 'id'));
		foreach ($halls as $key => $value) {
			$halls_array[] = $value->id;
		}

		$criteria = new CDbCriteria();
		$criteria->addInCondition('hall_id', $halls_array);
		$criteria->order = 'hall_id, time_start';

		$workouts = TimeboardItem::model()->findAll($criteria);

        foreach ($workouts as $workout) {
			$dump[$workout->hall_id][CHelper::trimSeconds($workout->time_start)][$workout->day_of_week]->time_start  = CHelper::trimSeconds($workout->time_start);
			$dump[$workout->hall_id][CHelper::trimSeconds($workout->time_start)][$workout->day_of_week]->time_finish = CHelper::trimSeconds($workout->time_finish);
			$dump[$workout->hall_id][CHelper::trimSeconds($workout->time_start)][$workout->day_of_week]->body = $workout->body;
		}

	    // get a reference to the path of PHPExcel classes
	    $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');

	    // Turn off our amazing library autoload
	     spl_autoload_unregister(array('YiiBase','autoload'));

	    // making use of our reference, include the main class
	    // when we do this, phpExcel has its own autoload registration
	    // procedure (PHPExcel_Autoloader::Register();)
	    include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

		/** PHPExcel_Writer_Excel2007 */
		include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel/Writer/Excel2007.php');

		// spl_autoload_register(array('YiiBase','autoload'));

	    // Create new PHPExcel object
	    $objPHPExcel = new PHPExcel();



		$styleCaption = array(
	        'font' => array(
	        	'size' => '12',
	      	),
	        'fill' => array(
	        	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	        	'startcolor' => array(
	          		'rgb' => 'C2AC92',
	        	),
	      	),
	    );

		$styleHeader = array(
	        'fill' => array(
	        	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	        	'startcolor' => array(
	          		'rgb' => 'DBCEBF',
	        	),
	      	),
	    );

		// Set properties
		$objPHPExcel->getProperties()->setCreator('Citrus Club')
			->setLastModifiedBy('Citrus Club')
			->setTitle('Office 2007 XLSX Workouts Document')
			->setSubject('Office 2007 XLSX Workouts Document')
			->setDescription("Расписание фитнес-клуба Цитрус.");


		$objPHPExcel->getDefaultStyle()
    		->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
    			->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
    			->setWrapText(true);


    	$columns = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');

		$row = 1;

		$sheet = $objPHPExcel->getActiveSheet();

		foreach ($dump as $hall => $workouts) {



			$sheet->SetCellValue('A' . $row, Hall::model()->findByPK($hall)->title);
			$sheet->mergeCells('A' . $row . ':H' . $row);

			$sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray($styleCaption);

			$row++;

			$sheet
				->SetCellValue('A' . $row, 'Время')
				->SetCellValue('B' . $row, 'Понедельник')
				->SetCellValue('C' . $row, 'Вторник')
				->SetCellValue('D' . $row, 'Среда')
				->SetCellValue('E' . $row, 'Четверг')
				->SetCellValue('F' . $row, 'Пятница')
				->SetCellValue('G' . $row, 'Суббота')
				->SetCellValue('H' . $row, 'Воскресенье');

			$sheet->getStyle('A' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('B' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('C' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('D' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('E' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('F' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('G' . $row)->applyFromArray($styleHeader);
			$sheet->getStyle('H' . $row)->applyFromArray($styleHeader);

			$sheet->getColumnDimension('A')->setAutoSize(true);
			$sheet->getColumnDimension('B')->setAutoSize(true);
			$sheet->getColumnDimension('C')->setAutoSize(true);
			$sheet->getColumnDimension('D')->setAutoSize(true);
			$sheet->getColumnDimension('E')->setAutoSize(true);
			$sheet->getColumnDimension('F')->setAutoSize(true);
			$sheet->getColumnDimension('G')->setAutoSize(true);
			$sheet->getColumnDimension('H')->setAutoSize(true);

			$row++;

			foreach ($workouts as $time_start => $value) {
				$sheet->SetCellValue('A' . $row, $time_start);
				$sheet->getStyle('A' . $row)->applyFromArray($styleHeader);

				for ($i = 1; $i <= 7; $i++) {

					if (isset($value[$i])) {
						$content = '';
						$content .= $value[$i]->time_start . '-' . $value[$i]->time_finish . PHP_EOL;
                    	$content .= strip_tags($value[$i]->body);

                    	$sheet
                    		->SetCellValue($columns[$i] . $row, $content);
					}
				}

				$row++;
			}
			$row++;
		}

		// Rename sheet
		$sheet->setTitle('Simple');

	    // Redirect output to a client’s web browser (Excel2007)
	    header('Content-Type: application/vnd.ms-excel');
	    header('Content-Disposition: attachment;filename="01simple.xls"');
	    header('Cache-Control: max-age=0');

	    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	    $objWriter->save('php://output');
	    Yii::app()->end();


	    spl_autoload_register(array('YiiBase','autoload'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Workout the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = TimeboardItem::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'Запрашиваемое занятие не существует.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Workout $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'timeboard-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

