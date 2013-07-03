<?php

class DocumentController extends RController
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

	public function actionDownload($id)
	{
		$model = $this->loadModel($id);
		$src = 'document/'.$model->file_attached; 
		if(@file_exists($src)) {
				$path_parts = @pathinfo($src);
				//$mime = $this->__get_mime($path_parts['extension']);
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				//header('Content-Type: '.$mime);
				header('Content-Disposition: attachment; filename='.basename($src));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($src));
				ob_clean();
				flush();
				readfile($src);
		} else {
				header("HTTP/1.0 404 Not Found");
				exit();
		}
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($task_id='')
	{
		$model=new Document;
		$model->project_number = Yii::app()->session['project_number'];
		$model->task_id = $task_id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			
			$document=CUploadedFile::getInstance($model,'file_attached');
			if ($document)
			{
				$document_name = $document->name;
				$document->SaveAs(Yii::app()->basePath . '/../document/' . $document_name);
				
				$model->file_attached = $document_name;
				
				if($model->save())
					$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&document=true'));
					// $this->redirect(array('view','id'=>$model->id));
			}
			else
			{
				if($model->save())
					$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&document=true'));
						// $this->redirect(array('view','id'=>$model->id));
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
		$oldDoc = $model->file_attached;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];

			$document=CUploadedFile::getInstance($model,'file_attached');
			if ($document)
			{
				unlink('document/'.$oldDoc);
				$document_name = $document->name;
				$document->SaveAs(Yii::app()->basePath . '/../document/' . $document_name);
				
				$model->file_attached = $document_name;
				
				if($model->save())
					$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&document=true'));
					// $this->redirect(array('view','id'=>$model->id));
			} else {
				$model->file_attached = $oldDoc;
				if($model->save())
					$this->redirect(array('/modproject/project/view&id='.Yii::app()->session['project_id'].'&document=true'));
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
		$model = $this->loadModel($id);
		unlink('document/'.$model->file_attached);
		$model->delete();


		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Document');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

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
		$model=Document::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('Document');
		$es->update();
	}
}
