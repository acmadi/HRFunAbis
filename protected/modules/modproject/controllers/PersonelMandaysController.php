<?php

class PersonelMandaysController extends RController
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
	public function actionCreate($employee_id)
	{
		$model=new PersonelMandays;
		$model->employee_id = $employee_id;
		$model->project_number = Yii::app()->session['project_number'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PersonelMandays']))
		{
			$model->attributes=$_POST['PersonelMandays'];
			if($model->save())
				$this->redirect(array('/modproject/personelmandays/detail&employee_id='.$model->employee_id));
				// $this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['PersonelMandays']))
		{
			$model->attributes=$_POST['PersonelMandays'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionAjaxUpdate()
	{
		$es = new EditableSaver('PersonelMandays');
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
		$dataProvider=new CActiveDataProvider('PersonelMandays');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PersonelMandays('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PersonelMandays']))
			$model->attributes=$_GET['PersonelMandays'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionDetail($employee_id)
	{
		$project_number = Yii::app()->session['project_number'];
		$personel = Personel::model()->findByAttributes(array('employee_id' => $employee_id));
		$personelMandays = PersonelMandays::model()->findAllByAttributes(array('employee_id' => $employee_id));
		foreach ($personelMandays as $pm) {
			$pm->month = PersonelMandays::model()->getMonth($pm->month);
		}
		$data = new CArrayDataProvider($personelMandays,array(
					'id' => 'id',
					'pagination' => array(
						'pageSize' => 30,
						),
					));
		$this->render('detail',array(
			'dataProvider'=>$data,
			'personel' => $personel
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PersonelMandays::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='personel-mandays-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
