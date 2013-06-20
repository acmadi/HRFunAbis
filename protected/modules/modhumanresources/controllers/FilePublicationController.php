<?php

class FilePublicationController extends RController
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
		$model=new FilePublication;
		$model->version = '1.1';
		$model->version_date = date('Y-m-d', time());

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FilePublication']))
		{
			$model->attributes=$_POST['FilePublication'];
			$file_upload = CUploadedFile::getInstance($model,'file_upload');
			if($file_upload)
			{
				$nama_file_upload= $file_upload->name;
				
				$file_upload->SaveAs(Yii::app()->basePath . '/../upload/hrpublish/'. $file_upload);
				$model->file_upload = Yii::app()->basePath . '/../upload/hrpublish/'.$nama_file_upload;
				
				if($model->save())
				{
					$this->redirect(array('admin'));
				}
			}
			// if($model->save())
				// $this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionDownload($id)
	{
		$model = $this->loadModel($id);
		$src = $model->file_upload; 
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FilePublication']))
		{
			$model->attributes=$_POST['FilePublication'];
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
	
	public function actionBatchDelete()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		 
		if(isset($_POST['id']) && $_POST['id']!=='')
		{
			foreach($_POST['id'] as $key=>$val)
				$this->loadModel($val)->delete();
		 
			Yii::app()->user->setFlash('success','<strong>Berhasil</strong> Anda berhasil menghapus.');
		}
		else
			Yii::app()->user->setFlash('error','<strong>Gagal</strong> Anda belum memilih data untuk di hapus.');
		$this->redirect(array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FilePublication');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FilePublication('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FilePublication']))
			$model->attributes=$_GET['FilePublication'];

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
		$model=FilePublication::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='file-publication-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
