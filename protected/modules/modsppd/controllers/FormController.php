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
		
		$persekot = Persekot::model()->find(array('condition'=>'sppd_id=:x AND flag=:y', 'params'=>array(':x'=>$id, ':y'=>'usulan')));
		$personnelslist = Personnel::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$personnels = new CArrayDataProvider($personnelslist,array(
					'id' => 'id',
					'pagination'=>false,
					));
		$rabdinaslist = RABDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$rabdinas = new CArrayDataProvider($rabdinaslist,array(
					'id' => 'id',
					'pagination'=>false,
					));
		$rabnondinaslist = RABNonDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$rabnondinas = new CArrayDataProvider($rabnondinaslist,array(
					'id' => 'id',
					'pagination'=>false,
					));
		if ($model->status == 'processed' || $model->status == 'closed') {
			$rjamuan = new CArrayDataProvider(ReimburseJamuan::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
						'id' => 'id',
						'pagination'=>false,
						));
			$rbbm = new CArrayDataProvider(ReimburseBBM::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
						'id' => 'id',
						'pagination'=>false,
						));
			$rother = new CArrayDataProvider(OtherReimburse::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
						'id' => 'id',
						'pagination'=>false,
						));
			$persekot2 =  Persekot::model()->find(array('condition'=>'sppd_id=:x AND flag=:y', 'params'=>array(':x'=>$id, ':y'=>'lpj')));
			$persekot3 = new Persekot;
			$realisasi = null;
			$this->render('dashboard2',array(
				'model'=>$model, 
				'persekot'=>$persekot, 
				'personnels' =>$personnels,
				'rabdinas'=>$rabdinas, 
				'rabnondinas'=>$rabnondinas,
				'rjamuan'=>$rjamuan,
				'rbbm' => $rbbm,
				'rother' => $rother,
				'persekot2' => $persekot2,
				'persekot3' => $persekot3,
				'realisasi' => $realisasi,
			));	

		} else {
			$this->render('dashboard1',array(
				'model'=>$model, 
				'persekot'=>$persekot, 
				'personnels' =>$personnels,
				'rabdinas'=>$rabdinas, 
				'rabnondinas'=>$rabnondinas, 
			));
		}
	}

	public function actionPertanggungjawaban($id)
	{
		$model = $this->loadModel($id);
		if ($model->status == 'created') {
			$model->status = 'processed' ;
			$model->save();
			$persekot = $this->createPersekot($id, 'lpj');
			$persekotdetail = $this->createPersekotDetail($persekot->id, 'Persekot', 0, $persekot->amount);
		}
		$this->redirect(array('view','id'=>$id));
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

			$statement_letter=CUploadedFile::getInstance($model,'statement_letter');
			if ($statement_letter) {
				$statement_letter_name = $statement_letter->name;
				$statement_letter->SaveAs(Yii::app()->basePath . '/../upload/sppd/' . $statement_letter_name);
				$model->statement_letter = $statement_letter_name;
			}

			$support_letter=CUploadedFile::getInstance($model,'support_letter');
			if ($support_letter) {
				$support_letter_name = $support_letter->name;
				$support_letter->SaveAs(Yii::app()->basePath . '/../upload/sppd/' . $support_letter_name);
				$model->support_letter = $support_letter_name;
			}

			if($model->save()) {
				$model->status = 'step2';
				$model->save();
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
		if ($model->status == 'step2') {	
			$personnel = new Personnel;
			$personnel->sppd_id = $model->id;
			$personnel->employee_id = $model->employee_id;
			$personnel->name = $model->name;
			if ($personnel->save()) {
				$model->status = 'step3';
				$model->save();
			}
		}
		$personnelslist = Personnel::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		$personnels = new CArrayDataProvider($personnelslist,array(
					'id' => 'id',
					'pagination'=>false,
					));
		
		$this->render('create2',array(
			'model'=>$model,
			'personnels' => $personnels,
			));
	}

	public function actionCreateStep3($id)
	{
		$model = $this->loadModel($id);
		$rab = null;
		if ($model->sppd_type == 'Dinas') {
			if ($model->status == 'step3') {
				$this->generateRABDinas($model->id);
			}
			$rab = RABDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		} else {
			$rab = RABNonDinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		}

		$rablist = new CArrayDataProvider($rab,array(
					'id' => 'id',
					'pagination'=>false,
					));
		$model->status = 'step4';
		$model->save();
		$this->render('create3',array(
			'model'=>$model,
			'rablist' => $rablist,
			));
	}

	public function actionCreateStep4($id)
	{
		$model = $this->loadModel($id);
		
		if ($model->status == 'step4') {
			$persekot = $this->createPersekot($id, 'usulan');
			$persekotdetail = $this->createPersekotDetail($persekot->id, 'Persekot',$persekot->amount,0);
			$model->status = 'created';
			$model->save();
			$this->render('create4',array(
					'model'=>$model,
					'persekot'=>$persekot,
					'persekotdetail'=>$persekotdetail,
				));
		} else {
			$this->redirect(array('view','id'=>$id));
		}
	}

	public function actionCreateFinished($id)
	{
		$model = $this->loadModel($id);
		$model->status = 'created';
		$model->save();
		$this->redirect(array('view','id'=>$id));
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

	public function actionUpload($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Form']))
		{
			$oldStatement = $model->statement_letter;
			$oldSupport = $model->support_letter;
			$model->attributes=$_POST['Form'];

			$statement_letter=CUploadedFile::getInstance($model,'statement_letter');
			if ($statement_letter) {
				$statement_letter_name = $statement_letter->name;
				$statement_letter->SaveAs(Yii::app()->basePath . '/../upload/sppd/' . $statement_letter_name);
				$model->statement_letter = $statement_letter_name;
				if ($oldStatement != '' && $statement_letter_name != $oldStatement) {
					unlink(Yii::app()->basePath . '/../upload/sppd/' . $oldStatement);
				}
			} else {
				$model->statement_letter = $oldStatement;
			}

			$support_letter=CUploadedFile::getInstance($model,'support_letter');
			if ($support_letter) {
				$support_letter_name = $support_letter->name;
				$support_letter->SaveAs(Yii::app()->basePath . '/../upload/sppd/' . $support_letter_name);
				$model->support_letter = $support_letter_name;
				if ($oldSupport != '' && $support_letter_name != $oldSupport) {
					unlink(Yii::app()->basePath . '/../upload/sppd/' . $oldSupport);
				}
			} else {
				$model->support_letter = $oldSupport;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('upload_form',array(
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
		$rab = MasterCost::model()->findAllByAttributes(array('class'=>$model->class));
		$personnelslist = Personnel::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id)));
		foreach ($personnelslist as $person) {
			foreach ($rab as $data) {
				$rabdinas = new RABDinas;
				$rabdinas->employee_id = $person->employee_id;
				$rabdinas->name = $person->name;
				$rabdinas->sppd_id = $model->id;
				$rabdinas->cost_description = $data->description;
				$rabdinas->days = $model->getNumberOfDays();
				if ($model->transport_type == 'Kendaraan Dinas') {
					switch ($data->code) {
						case 'btdk': // Transport Dari & Ke
						case 'btdt': // Transport di tempat tujuan
						case 'uash': // Uang angkutan setempat harian
							$rabdinas->amount = 0;
							break;
						case 'atd': // airport tax domestik
						case 'ati': // airport tax internasional
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara')?$data->amount * 2:0;
							break;
						case 'btst': // Biaya transport sarana transportasi
						case 'bph': // Biaya Penginapan Hotel
						case 'bum': // Biaya uang makan
						case 'bm': // Biaya Makan
						case 'ush': // Uang saku harian
						case 'da': // Daily allowance
						case 'pbp': // Penggantian biaya penginapan
						case 'bcp': // biaya cuci pakaian
						case 'btp': // biaya tunjangan perlengkapan
						case 'us': // uang saku
							$rabdinas->amount = $data->amount * $duration;
							break;		
					}	
				} else {
					switch ($data->code) {
						case 'btdk': // Transport Dari & Ke
							$rabdinas->amount = $data->amount * 2;
							break;
						case 'atd': // airport tax domestik
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type != 'Luar Negri')?$data->amount * 2:0;
							break;
						case 'ati': // airport tax internasional
							$rabdinas->amount = ($model->transport_vehicle == 'Pesawat Udara' && $model->sppd_type == 'Luar Negri')?$data->amount * 2:0;
							break;
						case 'btdt': // Transport di tempat tujuan
						case 'uash': // Uang angkutan setempat harian
						case 'btst': // Biaya transport sarana transportasi
						case 'bph': // Biaya Penginapan Hotel
						case 'bum': // Biaya uang makan
						case 'bm': // Biaya Makan
						case 'ush': // Uang saku harian
						case 'da': // Daily allowance
						case 'pbp': // Penggantian biaya penginapan
						case 'bcp': // biaya cuci pakaian
						case 'btp': // biaya tunjangan perlengkapan
						case 'us': // uang saku
							$rabdinas->amount = $data->amount * $duration;
							break;		
					}
				}
				
				$rabdinas->created_date = date('Y-m-d',time());
				$rabdinas->created_by = 'Dummy';
				$rabdinas->save();
			}
		}
	}

	public function createPersekot($id, $flag)
	{
		$model = $this->loadModel($id);
		$persekot = new Persekot;
		$persekot->sppd_id = $model->id;
		$persekot->paid_to = $model->name;
		$persekot->received_from = '-';
		$persekot->amount = ($model->sppd_type == 'Dinas')?RABDinas::model()->getTotal($id):RABNonDinas::model()->getTotal($id);
		$persekot->amount_in_words = '-';
		$persekot->check_giro_date = date('Y-m-d',time());
		$persekot->check_giro_number = '-';
		$persekot->currency_code = '-';
		$persekot->bank_code = '-';
		$persekot->journal_number = '-';
		$persekot->voucher_number = '-';
		$persekot->flag = $flag;
		$persekot->voucher_date = date('Y-m-d',time());
		$persekot->created_date = date('Y-m-d',time());
		$persekot->created_by = 'Dummy';
		$persekot->save();
		return $persekot;
	}

	public function createPersekotDetail($persekot_id, $description, $debit, $credit)
	{
		$persekotdetail = new PersekotDetail;
		$persekotdetail->parent_id = $persekot_id;
		$persekotdetail->account_code = '-';
		$persekotdetail->description = $description;
		$persekotdetail->debit = $debit;
		$persekotdetail->credit = $credit;
		$persekotdetail->created_date = date('Y-m-d',time());
		$persekotdetail->created_by = 'Dummy';
		$persekotdetail->save();
		return $persekotdetail;
	}
}
