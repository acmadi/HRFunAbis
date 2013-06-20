<?php

class DataRequestController extends RController
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
		$model=new DataRequest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DataRequest']))
		{
			$model->attributes=$_POST['DataRequest'];
			
			$file=CUploadedFile::getInstance($model,'request_attachment');
			if($file)
			{
				$nama_file = $file->name;
				$file->SaveAs(Yii::app()->basePath . '/../attachment/requestattachment/' . $file);
				
				$model->request_attachment = 'attachment/requestattachment/'.$nama_file;
					
				if($model->save())
				{				 
					Yii::app()->user->setFlash('flash_message', 'Reqe=uest has been created!!');
					$this->redirect(array('view','id'=>$model->id));
				}	
			}
			else
			{
			
				if($model->save())
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

		if(isset($_POST['DataRequest']))
		{
			$model->attributes=$_POST['DataRequest'];
			
			$file=CUploadedFile::getInstance($model,'request_attachment');
			if($file)
			{
				$nama_file = $file->name;
				$file->SaveAs(Yii::app()->basePath . '/../attachment/requestattachment/' . $file);
				
				$model->request_attachment = 'attachment/requestattachment/'.$nama_file;
					
				if($model->save())
				{				 
					Yii::app()->user->setFlash('flash_message', 'Request has been created!!');
					$this->redirect(array('view','id'=>$model->id));
				}	
			}
			else
			{
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DataRequest');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DataRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DataRequest']))
			$model->attributes=$_GET['DataRequest'];

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
		$model=DataRequest::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='data-request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
