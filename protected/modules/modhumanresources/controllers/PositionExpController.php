<?php

class PositionExpController extends RController
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
	
	
	public function actionExperience()
	{
		if(empty(Yii::app()->session['employee_id']))
		{
			$employee_id = $_GET['employee_id'];
			
			//set session
			Yii::app()->session['employee_id'] = $employee_id;
		}
		else
		{
			$employee_id = Yii::app()->session['employee_id'];
		}
		
		$model = PositionExp::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$employee_id)));			 
		
		$this->render('experience',array(
			'model'=>$model,
			'employee_id'=>$employee_id,
		));
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
		$model=new PositionExp;
		$model->employee_id = Yii::app()->session['employee_id'];
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PositionExp']))
		{
			$model->attributes=$_POST['PositionExp'];
			if($model->save())
			{
				$this->redirect(array('/modhumanresources/Employee/view&id='.Yii::app()->session['employee_id']));
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
		$employee_id = Yii::app()->session['employee_id'];
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['PositionExp']))
		{
			$model->attributes=$_POST['PositionExp'];
			if($model->save())
			{
				Yii::app()->user->setFlash('flash_message_detail', 'Job Experience has been update !!');
				$this->redirect(array('/modhumanresources/PositionExp/experience', array('employee_id'=>Yii::app()->session['employee_id'])));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('PositionExp');
		$es->update();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$model->delete();
		
		Yii::app()->user->setFlash('flash_message_detail', 'Job Experience #'.$id.'has been deleted !!');
		
		$this->redirect(array('/modhumanresources/PositionExp/experience', array('employee_id'=>Yii::app()->session['employee_id'])));
		
		// if(Yii::app()->request->isPostRequest)
		// {
			// // we only allow deletion via POST request
			// $id = $_GET['id'];
			// $child = $this->loadModel($id);//->delete();

			// $parentID = $child->employee_id;

			// $child->delete();

			
			// // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			// if(!isset($_GET['ajax']))
			// {
				// Yii::app()->user->setFlash('flash_message_detail', 'Certification success deleted !!');
				// $this->redirect(array('Employee/view', 'id'=>$parentID));
			// }
		// }
		// else
			// throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PositionExp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PositionExp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PositionExp']))
			$model->attributes=$_GET['PositionExp'];

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
		$model=PositionExp::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='position-exp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
