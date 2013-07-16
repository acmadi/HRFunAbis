<?php

class FormController extends RController
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
		
		Yii::app()->session['sppd_id'] = $model->id;
		Yii::app()->session['sppd_name'] = $model->purpose;
		
		$persekot = Persekot::model()->find(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$rabdinaslist = RABDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$rabdinas = new CArrayDataProvider($rabdinaslist,array(
					'id' => 'id',
					));
		$rabnondinaslist = RABNonDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$rabnondinas = new CArrayDataProvider($rabnondinaslist,array(
					'id' => 'id',
					));
		
		$this->render('dashboard1',array(
			'model'=>$model, 
			'persekot'=>$persekot, 
			'rabdinas'=>$rabdinas, 
			'rabnondinas'=>$rabnondinas, 
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Form;
		$model->employee_id = Yii::app()->user->getEmployeeID();
		$model->name = Employee::model()->getName(Yii::app()->user->getEmployeeID());
		$model->service_provider = 'PGN SOLUTION';
		$model->unit = 'PGN SOLUTION';


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Form']))
		{
			$model->attributes=$_POST['Form'];
			$model->created_by = 'Dummy';
			$model->created_date = date('Y-m-d',time());
			if($model->save()) {
				if ($model->sppd_type == 'Dinas') {
					$this->generateRABDinas($model->id);
				}
				$this->redirect(array('createStep2','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionCreateStep2($id)
	{
		$model = $this->loadModel($id);
		$rab = null;
		if ($model->sppd_type == 'Dinas') {
			$rab = RABDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		} else {
			$rab = RABNonDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		}

		$rablist = new CArrayDataProvider($rab,array(
					'id' => 'id',
					));
		$this->render('create2',array(
			'model'=>$model,
			'rablist' => $rablist,
			));
	}

	public function actionCreateStep3($id)
	{
		$model = $this->loadModel($id);
		$persekot = new Persekot;
		$persekot->sppd_id
		$persekot->paid_to
		$persekot->received_from
		$persekot->amount
		$persekot->amount_in_words
		$persekot->check_giro_date
		$persekot->check_giro_number
		$persekot->currency_code
		$persekot->bank_code
		$persekot->journal_number
		$persekot->voucher_number
		$persekot->voucher_date
		$persekot->created_by
		$persekot->created_date
		

		$persekotdetails = new CArrayDataProvider($rab,array(
					'id' => 'id',
					));
		$this->render('create3',array(
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

		if(isset($_POST['Form']))
		{
			$model->attributes=$_POST['Form'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Form');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Form('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Form']))
			$model->attributes=$_GET['Form'];

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
		$model=Form::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function generateRABDinas($id)
	{
		$model = $this->loadModel($id);
		$duration = $model->getNumberOfDays();
		$rab = null;
		if ($model->sppd_type == 'Dinas') {
			$rab = MasterCost::model()->findAllByAttributes(array('class'=>$model->class));
		}

		foreach ($rab as $data) {
			$rabdinas = new RABDinas;
			$rabdinas->employee_id = $model->employee_id;
			$rabdinas->name = $model->name;
			$rabdinas->sppd_id = $model->id;
			$rabdinas->cost_description = $data->description;
			$rabdinas->amount = ($data->code == 'btdk' || $data->code == 'atd')?$data->amount * 2:$data->amount * $duration;
			$rabdinas->created_date = date('Y-m-d',time());
			$rabdinas->created_by = 'Dummy';
			$rabdinas->save();
		}
	}
}
