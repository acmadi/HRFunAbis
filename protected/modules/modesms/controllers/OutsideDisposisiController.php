<?php

class OutsideDisposisiController extends RController
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
		$surat = OutsideLetter::model()->findByPk($model->outside_id);
		
		$this->render('view',array(
			'model'=>$model,
			'surat'=>$surat,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new OutsideDisposisi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OutsideDisposisi']))
		{
			$model->attributes=$_POST['OutsideDisposisi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionTree()
	{
		$model=new OutsideDisposisi('search');
        $dataProvider=new CActiveDataProvider('OutsideDisposisi');
 
        $criteria = new CDbCriteria();
 
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['OutsideDisposisi']))
        {
 
               foreach($_GET['OutsideDisposisi'] as $key=>$value) {
                    $criteria -> compare($key, $value, true, 'AND');
               }
               $dataProvider = new CActiveDataProvider('OutsideDisposisi', array('criteria' => $criteria));
        }
 
        $this->render('tree',array(
            'model'=>$model,'dataProvider'=>$dataProvider
        ));
	}
	
	public function actionDisposisi($id)
	{
		$parent = $this->loadModel($id);
		
		$model=new OutsideDisposisi;
		$model->parent_id = $id; 
		$model->outside_id = $parent->outside_id; 
		$model->number = $parent->number; 
		$model->subject = $parent->subject; 
		$model->summary = $parent->summary; 
		$model->disposisi_from = Yii::app()->user->getEmployeeID();
		//$model->disposisi_to = DisposisiTree::model()->getChild(Yii::app()->user->getEmployeeID());
		
		$disposisi_to = DisposisiTree::model()->getChild(Yii::app()->user->getEmployeeID());
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['OutsideDisposisi']))
		{
			$model->attributes=$_POST['OutsideDisposisi'];
			{
				foreach($model->disposisi_to as $i=>$item)
				{
					$this->insertDisposisi($model->parent_id, $model->outside_id, $model->number, $model->subject, $model->summary, $model->disposisi_task, Yii::app()->user->getEmployeeID(),
					$item);
				}
			}
			//if($model->save())
			//$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'disposisi_to'=>$disposisi_to,
		));
	}
	
	public function insertDisposisi($parent_id, $outside_id, $number, $subject, $summary, $task, $disposisi_from, $disposisi_to)
	{
		
		$sql="INSERT INTO `esms_outside_disposisi`
						  (`id`, `parent_id`,`outside_id`, `number`,`subject`, `summary`,`disposisi_task`, `disposisi_from`, `disposisi_to`) 
					VALUES(NULL, :parent_id, :outside_id, :number, :subject, :summary, :disposisi_task, :disposisi_from, :disposisi_to)";
					
		$command=Yii::app()->db->createCommand($sql);
				
		$command->bindParam(":parent_id",$parent_id,PDO::PARAM_STR);
		$command->bindParam(":outside_id",$outside_id,PDO::PARAM_STR);
		$command->bindParam(":number",$number,PDO::PARAM_STR);
		$command->bindParam(":subject",$subject,PDO::PARAM_STR);
		$command->bindParam(":summary",$summary,PDO::PARAM_STR);
		$command->bindParam(":disposisi_task",$task,PDO::PARAM_STR);
		$command->bindParam(":disposisi_from",$disposisi_from,PDO::PARAM_STR);
		$command->bindParam(":disposisi_to",$disposisi_to,PDO::PARAM_STR);
		

		$command->execute();
		
		//send email
		$to_email = DisposisiTree::model()->getEmail($disposisi_to);
		$to_name = DisposisiTree::model()->getName($disposisi_to);
		$from_email = DisposisiTree::model()->getEmail($disposisi_from);
		$from_name = DisposisiTree::model()->getName($disposisi_from); 
		
		$body = $summary.'<br> Link Contoh <a href="http://apps.pgas-solution.co.id/index.php?r=modesms/outsideDisposisi/view&id='.Yii::app()->db->getLastInsertID()

.'">Klik</a>';
		
		$this->sendEmail($to_email, $to_name, $from_email, $from_name, $subject, $body);
		//end send email
			
		
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

		if(isset($_POST['OutsideDisposisi']))
		{
			$model->attributes=$_POST['OutsideDisposisi'];
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
		$dataProvider=new CActiveDataProvider('OutsideDisposisi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		// $model=new OutsideDisposisi('search');
        // $dataProvider=new CActiveDataProvider('OutsideDisposisi');
 
        // $criteria = new CDbCriteria();
		// //$criteria->compare('disposisi_to',1110004, false, '=');
		
		// $criteria->condition = "disposisi_to = ".Yii::app()->user->getEmployeeID();

        // $model->unsetAttributes();  // clear any default values
        // if(isset($_GET['OutsideDisposisi']))
        // {
 
               // foreach($_GET['OutsideDisposisi'] as $key=>$value) {
                    // $criteria -> compare($key, $value, true, 'AND');
               // }
               // $dataProvider = new CActiveDataProvider('OutsideDisposisi', array('criteria' => $criteria));
        // }
 
        // $this->render('admin',array(
            // 'model'=>$model,'dataProvider'=>$dataProvider
        // ));
		
		$model=new OutsideDisposisi('search');
		$model->unsetAttributes();  // clear any default values
		$model->disposisi_to = Yii::app()->user->getEmployeeID();
		if(isset($_GET['OutsideDisposisi']))
			$model->attributes=$_GET['OutsideDisposisi'];

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
		$model=OutsideDisposisi::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='outside-disposisi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
