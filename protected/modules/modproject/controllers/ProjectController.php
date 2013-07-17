<?php

class ProjectController extends RController
{
	public function init()
	{
		//$this->_authorizer = $this->module->getAuthorizer();
		$this->layout = $this->module->layout;
		$this->defaultAction = 'admin';

		// Register the scripts
		$this->module->registerScripts();
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights',	
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id); 
		
		Yii::app()->session['project_number'] = $model->number;
		Yii::app()->session['project_id'] = $model->id;
		
		$progress = new Progress('search');
		$progress->unsetAttributes();
		if (isset($_GET['Progress'])) {
			$progress->attributes=$_GET['Progress'];
		}
		$tasks = new CArrayDataProvider($this->createTasksTree(),array(
					'id' => 'id',
					'pagination'=>false
					));
		$documents = new Document('search');
		$documents->unsetAttributes();
		if (isset($_GET['Document'])) {
			$documents->attributes=$_GET['Document'];
		}
		$finances = new Finance('search');
		$finances->unsetAttributes();
		if (isset($_GET['Finance'])) {
			$finances->attributes=$_GET['Finance'];
		}
		$procurements = new Procurement('search');
		$procurements->unsetAttributes();
		if (isset($_GET['Procurement'])) {
			$procurements->attributes=$_GET['Procurement'];
		}
		$personels = new Personel('search');
		$personels->unsetAttributes();
		if (isset($_GET['Personel'])) {
			$personels->attributes=$_GET['Personel'];
		}
		
		$this->render('dashboard',array(
			'model'=>$model,
			'progress'=>$progress,
			'tasks'=>$tasks,
			'documents'=>$documents,
			'finances'=>$finances,
			'procurements'=>$procurements,
			'personels'=>$personels,
			'info'=>true,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Project;
		$model->version = '1.0';
		$model->version_date = date('Y-m-d',time());

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			$model->duration = $model->getNumberOfDays();
			if($model->save()) {
				$numOfWeek = $model->getNumberOfWeeks();
				for ($i=0; $i < $numOfWeek; $i++) { 
					$progress = new Progress;
					$progress->project_number = $model->number;
					$progress->period_date = $model->plan_start_date;
					$progress->period_date_to = $model->plan_end_date;
					$progress->description = '-';
					$progress->termin_pgn = '-';
					$progress->termin_vendor = '-';
					$progress->progress_actual = 0;
					$progress->progress_plan = 0;
					$progress->progress_this_week = '-';
					$progress->completed_work = '-';
					$progress->work_remaining = '-';
					$progress->reason_of_delay = '-';
					$progress->pic = '-';
					$progress->period_week = $i+1;
					$progress->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAjaxupdate()
	{
		$es = new EditableSaver('Project');
		$es->update();
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionReport()
	{
		$project_number = Yii::app()->session['project_number'];
		$project = Project::model()->findByAttributes(array('number'=>$project_number));
		$finances = Finance::model()->findAllByAttributes(array('project_number' => $project_number));
		$personels = Personel::model()->findAllByAttributes(array('project_number' => $project_number));
		$procurements = Procurement::model()->findAllByAttributes(array('project_number' => $project_number));
		$this->render('report', array(
			'project' => $project,
			'finances' => $finances,
			'personels' => $personels,
			'procurements' => $procurements
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Project::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTest()
	{
		$this->createTasksTree();
	}

	public function createTasksTree()
	{
		$roots = Task::model()->findAllByAttributes(array('parent_id'=>0,'project_number'=>Yii::app()->session['project_number']));
		$taskData = array();
		foreach ($roots as $root) {
			$this->getChildren($taskData,$root->id);
		}
		return $taskData;
	}

	public function getChildren(&$array, $parentId)
	{
		array_push($array, Task::model()->findByPk($parentId));
		$children = Task::model()->findAllByAttributes(array('parent_id'=>$parentId));
		if ($children) {
			foreach ($children as $child) {
				$this->getChildren($array,$child->id);
			}
		} else {
			return;
		}
	}

	public function actionExcel(){
		$project = Project::model()->findByAttributes(array('number'=>Yii::app()->session['project_number']));
		$latestProgress = Progress::model()->getLatestProgress($project->number);
        XPHPExcel::init();

		$src = Yii::app()->baseUrl.'document/template.xls';
        $objPHPExcel = PHPExcel_IOFactory::load($src);
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle($project->number);

        // Styling
        $borderStyle = array(
        	'borders' => array(
        		'allborders' => array(
        			'style' => PHPExcel_Style_Border::BORDER_THIN,
        			'color' => array('argb' => 'FF000000'),
        			),
        		),
        	);
        
        // Add project data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B5', $project->name)
            ->setCellValue('C6', date('d/m/Y',strtotime($project->plan_start_date)))
            ->setCellValue('C7', date('d/m/Y',strtotime($project->plan_end_date)))
            ->setCellValue('C8', $project->getNumberOfDays())
            ->setCellValue('C9', $project->amount)
            ->setCellValue('C10', $project->number)
            ->setCellValue('D5', $latestProgress->work_remaining);
        $objPHPExcel->getActiveSheet()->getStyle('D5')->getAlignment()->setWrapText(true);

        $monthIndex = array (
			'Januari' => 'G',
			'Februari' => 'H',
			'Maret' => 'I',
			'April' => 'J',
			'Mei' => 'K',
			'Juni' => 'L',
			'Juli' => 'M',
			'Agustus' => 'N',
			'September' => 'O',
			'Oktober' => 'P',
			'November' => 'Q',
			'Desember' => 'R',
			);

        // set offset
        $offset = 0;

        // Add Finance Data
        $no = 1;
        $finances = Finance::model()->findAllByAttributes(array('project_number'=>$project->number));
        $elbicodes = CHtml::listData(Elbicode::model()->findAll(), 'elbi', 'elbi_desc');
        $numofelbi = sizeof($elbicodes);
        if ($numofelbi >= 1) {
        	$insertRow = 0;
        	if ($numofelbi > 1) {
        		$insertRow = $numofelbi - 1;
        		$objPHPExcel->getActiveSheet()->insertNewRowBefore((13+$offset), $insertRow);
        	}
        	$i = 0;
        	foreach ($elbicodes as $elbi => $elbi_desc) {
        		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('D'.(12+$offset+$i),$no)
					->setCellValue('E'.(12+$offset+$i),$elbi)
					->setCellValue('F'.(12+$offset+$i),$elbi_desc);

				// Get amount each month
				foreach ($finances as $finance) {
					$value = ($finance->credit == 0) ? $finance->debit : -$finance->credit;
					if ($finance->elbi == $elbi) {
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue($monthIndex[$finance->period_month].''.(12+$offset+$i),$value);
					}
				}

				$no++;
				$i++;
        	}
        	// numbering format
        	$objPHPExcel->getActiveSheet()
        		->getStyle('G'.(12+$offset).':R'.(12+$numofelbi+$offset-1))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
        	$offset =+ $insertRow;
        }

        // Add Personnel Data
        $no = 1;
        $personnels = Personel::model()->findAllByAttributes(array('project_number'=>$project->number));
        $numOfPersonnel = sizeof($personnels);
        if ($numOfPersonnel >= 1) {
        	$insertRow = 0;
        	if ($numOfPersonnel > 1) {
        		$insertRow = $numOfPersonnel - 1;
        		$objPHPExcel->getActiveSheet()->insertNewRowBefore((30+$offset), $insertRow);
        		// merge cells
        		for ($i=0; $i < $numOfPersonnel-1; $i++) { 
        			$objPHPExcel->getActiveSheet()->mergeCells('C'.(30+$offset+$i).':D'.(30+$offset+$i));
        		}
			}
			$i = 0;
			foreach ($personnels as $person) {
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('B'.(29+$offset+$i),$no)
					->setCellValue('C'.(29+$offset+$i),$person->position)
					->setCellValue('E'.(29+$offset+$i),$person->name)
					->getCell('F'.(29+$offset+$i))->setValueExplicit($person->telepon, PHPExcel_Cell_DataType::TYPE_STRING);

				// Get mandays
				$mandays = PersonelMandays::model()->getAllMandays($person->employee_id);
				foreach ($mandays as $manday) {
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($monthIndex[$manday->month].''.(29+$offset+$i),$manday->mandays);
				}
				$i++;
				$no++;
			}
			$objPHPExcel->setActiveSheetIndex(0)
	        	->getStyle('B'.(29+$offset).':F'.(29+$numOfPersonnel+$offset-1))
	        	->applyFromArray($borderStyle);
	        $offset += $insertRow;
        }

        // Add Procurement Data
        $no = 1;
        $procurements = Procurement::model()->findAllByAttributes(array('project_number'=>$project->number));
        $numOfProcurements = sizeof($procurements);

        if ($numOfProcurements >= 1) {
        	$insertRow = 0;
        	$offset2 = $offset;
        	if ($numOfProcurements > 1) {
        		$insertRow = $numOfProcurements - 1;
        		$objPHPExcel->getActiveSheet()->insertNewRowBefore((34+$offset), $insertRow);
        		$offset2 += $insertRow;
        		$objPHPExcel->getActiveSheet()->insertNewRowBefore((37+$offset2), $insertRow);
        	}
        	$i = 0;
			foreach ($procurements as $procurement) {
				// upper table
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('B'.(33+$offset+$i),$no)
					->setCellValue('C'.(33+$offset+$i),$procurement->vendor)
					->setCellValue('D'.(33+$offset+$i),$procurement->contract)
					->setCellValue('E'.(33+$offset+$i),date('d/m/Y',strtotime($procurement->contract_start_date)).' - '.date('d/m/Y',strtotime($procurement->contract_start_date)))
					->setCellValue('F'.(33+$offset+$i),$procurement->unit_price * 1.1);

				// Get price each month
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($monthIndex[$procurement->period_month].''.(33+$offset+$i),($procurement->total_price * 1.1));

				// lower table
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('B'.(36+$offset2+$i),$procurement->item)
					->setCellValue('C'.(36+$offset2+$i),$procurement->amount)
					->setCellValue('D'.(36+$offset2+$i),$procurement->location)
					->setCellValue('E'.(36+$offset2+$i),($procurement->total_price * 1.1));

				$i++;
				$no++;
			}

			// numbering format
        	$objPHPExcel->getActiveSheet()
        		->getStyle('G'.(33+$offset).':R'.(33+$numOfProcurements+$offset-1))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
        	$objPHPExcel->getActiveSheet()
        		->getStyle('F'.(33+$offset).':F'.(33+$numOfProcurements+$offset-1))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
        	$objPHPExcel->getActiveSheet()
        		->getStyle('E'.(36+$offset2).':E'.(36+$numOfProcurements+$offset2-1))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
        	$offset =+ $insertRow;
        }
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        // Freeze pane
        $objPHPExcel->getActiveSheet()->freezePane('G11');
        
        // Save a xls file
        $filename = 'Report_'.$project->number.'['.date('d-m-Y',time()).']';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
    }
}
