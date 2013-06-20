<?php

class EmployeeController extends RController
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
	 * Export file to exel .
	 */
	public function actionAdminExel()
	{
		$data = Employee::model()->findAll();
		$fields = array(
				'employee_id',
				'name',
				'full_name',
				'pgassol_email',
				'phone_mobile',
				'department',
				'position',
				'date_employee',
				'employee_status',
				'effective_date',
				'previous_employee_id',
				'gender',
				'place_of_birth',
				'birth_date',
				'religion',
				'blood_type',
				'ktp',
				'passport',
				'driver_licence',
				'jamsostek',
				'npwp',
				'phone_home',
				'phone_mobile',
				'address_current_1',
				'address_current_2',
				'address_ktp',
				'private_email',
		);

		ExcelExporter::sendAsXLS('exel_employee', $data, 'List Employee', true, $fields);
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Yii::app()->session['employee_id'] = $id;
		
		$dependent = Dependent::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		
		$emergency = EmergencyRecord::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		$education = Education::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		$experience = JobExperience::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		$positionExp = PositionExp::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		$certification = Certification::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
		$kpi = Kpi::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>$id)));
	
		$model = $this->loadModel($id);
		if($model->date_employee == '0000-00-00')
		{
			$model->date_employee = date('y-m-d', time());
			$model->update();
		}	
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dependent'=>$dependent,
			'emergency'=>$emergency,
			'education'=>$education,
			'experience'=>$experience,
			'positionExp'=>$positionExp,
			'certification'=>$certification,
			'kpi'=>$kpi,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Employee;
		
		$model->number_of_dependent = 0;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			
			$gambar=CUploadedFile::getInstance($model,'photo');
			if($gambar)
			{
				$nama_gambar = $gambar->name;
				$gambar->SaveAs(Yii::app()->basePath . '/../photo/' . $nama_gambar);
				
				$model->photo = 'photo/'.$nama_gambar;
					
				if($model->save())
				{				 
					Yii::app()->user->setFlash('flash_message', 'Employee has been created!!');
					$this->redirect(array('view','id'=>$model->employee_id));
				}	
			}
			else
			{
				if($model->save())
				{
					Yii::app()->user->setFlash('flash_message', 'Employee has been created !!');
					$this->redirect(array('view','id'=>$model->employee_id));
				}
			}
			
			// $model->attributes=$_POST['Employee'];
			// if($model->save())
			// {
				// Yii::app()->user->setFlash('flash_message', 'Employee has been created !!');
				// $this->redirect(array('view','id'=>$model->employee_id));
			// }
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
		$photo = $model->photo;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		
		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			
			$gambar=CUploadedFile::getInstance($model,'photo');
			if($gambar)
			{
				$nama_gambar = $gambar->name;
				$gambar->SaveAs(Yii::app()->basePath . '/../photo/' . $nama_gambar);
				
				$model->photo = 'photo/'.$nama_gambar;
					
				if($model->save())
				{				 
					$this->redirect(array('/modhumanresources/Employee/view&id='.Yii::app()->session['employee_id']));
				}	
			}
			else
			{
				$model->photo = $photo;
				if($model->save())
				{				 
					$this->redirect(array('/modhumanresources/Employee/view&id='.Yii::app()->session['employee_id']));
				}
			}
			
		}
		
		//
		// if(isset($_POST['Employee']))
		// {
			// $model->attributes=$_POST['Employee'];
			// if($model->save())
			// {
				// Yii::app()->user->setFlash('flash_message', 'Employee has been updated!!');
				// $this->redirect(array('view','id'=>$model->employee_id));
			// }
		// }
		//
		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('Employee');
		$es->update();
	}
	
	public function actionUpdatePassword()
	{
		if(isset($_GET['username']))
		{
			$username = $_GET['username'];
			$newPassword = $_GET['newPassword'];
			
			$salt = uniqid('',true);
			
			$hash = $this->hashPassword($newPassword, $salt); //UPDATE `hr2fun`.`rbac_user` SET `username` = 'yaqub' WHERE `rbac_user`.`id` =71;
			
			$sql="UPDATE 
					`rbac_user`
				  SET 
					`username`= :username, 
					`password`= :password, 
					`salt`=:salt
				  WHERE 
					`rbac_user`.`employee_id` = :employee_id
				";
				
				$command=Yii::app()->db->createCommand($sql);
				
				$employee_id = Yii::app()->session['employee_id'];
				
				$command->bindParam(":username",$username,PDO::PARAM_STR);
				$command->bindParam(":password",$hash, PDO::PARAM_STR);
				$command->bindParam(":salt",$salt,PDO::PARAM_STR);
				$command->bindParam(":employee_id",$employee_id,PDO::PARAM_STR);
				
				if($command->execute())
					$this->redirect(array('/modhumanresources/Employee/view&id='.Yii::app()->session['employee_id']));
		}
		
		$this->render('pages/update_password',array());
	}
	
	
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
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
			{
				Yii::app()->user->setFlash('flash_message', 'Employee success deleted !!');
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Employee');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employee('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee']))
			$model->attributes=$_GET['Employee'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	/**
	 * Manages all models filtered by department.
	 */
	public function actionAdminByDepartment($department)
	{
		$model=new Employee('search');
		$model->unsetAttributes();  // clear any default values
		$model->department=$department;//=Employee::model()->findByAttributes(array('department'=>$department));
		
		// if(isset($_GET['Employee']))
			// $model->attributes=$_GET['Employee'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Manages all models filtered by position.
	 */
	public function actionAdminByposition($position)
	{
		$model=new Employee('search');
		$model->unsetAttributes();  // clear any default values
		$model->position = $position;
		// if(isset($_GET['Employee']))
			// $model->attributes=$_GET['Employee'];

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
		$model=Employee::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
