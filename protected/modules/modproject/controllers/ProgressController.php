<?php

class ProgressController extends RController
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Progress;
		$model->project_number = Yii::app()->session['project_number'];
		$model->period_week = Progress::model()->getPeriodWeek($model->project_number);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Progress']))
		{
			$model->attributes=$_POST['Progress'];
			if($model->save()) {
				Project::model()->updateProgress(Yii::app()->session['project_id'],$model->progress_actual, $model->progress_plan);
				$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&progress=true'));
				//$this->redirect(array('view','id'=>$model->id));

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
		$this->performAjaxValidation($model);

		if(isset($_POST['Progress']))
		{
			$model->attributes=$_POST['Progress'];
			if($model->save())
				$progress = Progress::model()->getLatestProgress(Yii::app()->session['project_number']);
				Project::model()->updateProgress(Yii::app()->session['project_id'],$progress->progress_actual, $progress->progress_plan);
				$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&progress=true'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('Progress');
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
		$progress = Progress::model()->getLatestProgress(Yii::app()->session['project_number']);
		Project::model()->updateProgress(Yii::app()->session['project_id'],$progress->progress_actual, $progress->progress_plan);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Progress');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Progress('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Progress']))
			$model->attributes=$_GET['Progress'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Progress::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='progress-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
