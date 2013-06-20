<?php

class OutsideLetterController extends RController
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
		$model=new OutsideLetter;
		
		$model->version = '1.0';
		$model->version_date = date('Y-m-d', time());
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OutsideLetter']))
		{
			$model->attributes=$_POST['OutsideLetter'];
			
			$file_upload = CUploadedFile::getInstance($model,'file_upload');
			
			if($file_upload)
			{
				$nama_file_upload= $file_upload->name;
				$file_upload->SaveAs(Yii::app()->basePath . '/../upload/surat/'. $file_upload);
				$model->file_upload = '/upload/surat/'.$nama_file_upload;
				
				if($model->save())
				{
					$this->redirect(array('afterSubmit','id'=>$model->id));
				}
			}
			else
			{
				$model->save();
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('upload',array(
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

		if(isset($_POST['OutsideLetter']))
		{
			$model->attributes=$_POST['OutsideLetter'];
			if($model->save())
			{
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAfterSubmit($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OutsideLetter']))
		{
			$model->attributes=$_POST['OutsideLetter'];
				
				
			if($model->save())// && empty($data))
			{
				//cek existing data 
				$data = OutsideDisposisi::model()->findByAttributes(array('outside_id'=>$id));
				if(empty($data))
					$this->insertDisposisi($model->id);
				//end cek existing data
				
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function insertDisposisi($id)//$outside_id, $number, $subject, $from, $to)
	{
		$parent=$this->loadModel($id);
		$id = $parent->id; 
		$number = $parent->number; 
		$subject = $parent->subject; 
		$summary = $parent->summary; 
		$task = 'New Letter';
		$from_company = $parent->from_company; 
		$to = $parent->to; 

		if(!empty($id) && !empty($number) && !empty($subject) && !empty($summary) &&!empty($from_company) &&!empty($to))
		{
		
			$sql="INSERT INTO `esms_outside_disposisi`
						  (`id`, `outside_id`, `number`,`subject`, `summary`,`disposisi_task`, `disposisi_from`, `disposisi_to`) 
					VALUES(NULL, :outside_id, :number, :subject, :summary, :disposisi_task, :disposisi_from, :disposisi_to)";
					
			$command=Yii::app()->db->createCommand($sql);
					
			$command->bindParam(":outside_id",$id,PDO::PARAM_STR);
			$command->bindParam(":number",$number,PDO::PARAM_STR);
			$command->bindParam(":subject",$subject,PDO::PARAM_STR);
			$command->bindParam(":summary",$summary,PDO::PARAM_STR);
			$command->bindParam(":disposisi_task",$task,PDO::PARAM_STR);
			$command->bindParam(":disposisi_from",$from_company,PDO::PARAM_STR);
			$command->bindParam(":disposisi_to",$to,PDO::PARAM_STR);
			

			$command->execute();
			
			//send email
			$to_email = DisposisiTree::model()->getEmail($to);
			$to_name = DisposisiTree::model()->getName($to);
			$from_email = 'automail@pgas-solution.co.id';
			$from_name = DisposisiTree::model()->getName($from_company); 
			
			$body = $summary.'<br> Link Contoh <a href="http://apps.pgas-solution.co.id/index.php?r=modesms/outsideDisposisi/view&id='.Yii::app()->db->getLastInsertID()

.'">Klik</a>';
			
			$this->sendEmail($to_email, $to_name, $from_email, $from_name, $subject, $body);
			//end send email
		}
	}
	
	public function sendEmail($to_email, $to_name, $from_email, $from_name, $subject, $body)
	{
		$message = new YiiMailMessage();
		$message->setTo(array($to_email=>$to_name));
		$message->setFrom(array($from_email=>$from_name));
		$message->setSubject($subject);
		$message->setBody($body, 'text/html');
		$numsent = Yii::app()->mail->send($message);
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('OutsideLetter');
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
		$dataProvider=new CActiveDataProvider('OutsideLetter');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new OutsideLetter('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['OutsideLetter']))
			$model->attributes=$_GET['OutsideLetter'];

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
		$model=OutsideLetter::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='outside-letter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
