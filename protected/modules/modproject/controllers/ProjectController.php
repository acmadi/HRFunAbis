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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			$model->duration = $model->getNumberOfDays();
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
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
}
