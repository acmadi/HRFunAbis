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
		$status = new CArrayDataProvider(StatusTracking::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
					'id' => 'id',
					'sort' => array(
						'defaultOrder' => 'status_date desc, id desc',
						),
					'pagination'=> array(
						'pageSize' => 5,
						),
					));
		if ($model->status == 'ON_PROCESS' || $model->status == 'CLOSED' || $model->status == 'REQUEST_FOR_ACCOUNTABILITY_APPROVAL' || $model->status == 'ACCOUNTABILITY_REVIEWED') {
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
			$persekot2 =  Persekot::model()->find(array('condition'=>'sppd_id=:x AND flag=:y', 'params'=>array(':x'=>$id, ':y'=>'lpj1')));
			$persekot3 = Persekot::model()->find(array('condition'=>'sppd_id=:x AND flag=:y', 'params'=>array(':x'=>$id, ':y'=>'lpj2')));;
			$realisasi = new CArrayDataProvider(RealNondinas::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
						'id' => 'id',
						'pagination'=>false,
						));
			$attachments = new CArrayDataProvider(Attachment::model()->findAll(array('condition'=>'sppd_id=:x', 'params'=>array(':x'=>$id))),array(
						'id' => 'id',
						'pagination'=>false,
						));
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
				'attachments' => $attachments,
				'status' => $status
			));	

		} else {
			$this->render('dashboard1',array(
				'model'=>$model, 
				'persekot'=>$persekot, 
				'personnels' =>$personnels,
				'rabdinas'=>$rabdinas, 
				'rabnondinas'=>$rabnondinas,
				'status' => $status,
			));
		}
	}

	public function actionPertanggungjawaban($id)
	{
		$model = $this->loadModel($id);
		if ($model->status == 'PAID') {
			$model->setStatus('ON_PROCESS', '-', 'System');
			$persekot2 = Persekot::model()->createPersekot($id, 'lpj1');
			PersekotDetail::model()->createPersekotDetail($persekot2->id, 'Persekot', 0, $persekot2->amount);
			$persekot3 = Persekot::model()->createPersekot($id,'lpj2');
			if ($model->sppd_type != 'Dinas') {
				RealNondinas::model()->generateRealNonDinas($id);
				$rab = RABNonDinas::model()->findAllByAttributes(array('sppd_id'=>$id));
				foreach ($rab as $item) {
					PersekotDetail::model()->createPersekotDetail($persekot3->id, $item->explanation,0,$item->amount);
				}
			} else {
				$rab = RABDinas::model()->findAllByAttributes(array('sppd_id'=>$id));
				foreach ($rab as $item) {
					PersekotDetail::model()->createPersekotDetail($persekot3->id, $item->cost_description,0,$item->amount);
				}
			}
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
				RABDinas::model()->generateRABDinas($model->id);
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
			$persekot = Persekot::model()->createPersekot($id, 'usulan');
			$persekotdetail = PersekotDetail::model()->createPersekotDetail($persekot->id, 'Persekot',$persekot->amount,0);
			
		}
		$this->render('create4',array(
					'model'=>$model,
					'persekot'=>$persekot,
					'persekotdetail'=>$persekotdetail,
				));
	}

	public function actionCreateFinished($id)
	{
		$model = $this->loadModel($id);
		$model->setStatus('CREATED', '-', 'System');
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
		$criteria = new CDbCriteria;
		$criteria->condition = 'employee_id =:empid AND status !=:stat1 AND status !=:stat2 AND status !=:stat3 AND status !=:stat4';
		$criteria->params = array(
						'empid' => Yii::app()->user->getEmployeeID(),
						'stat1'=>'step1',
						'stat2'=>'step2',
						'stat3'=>'step3',
						'stat4'=>'step4',
						);
		$criteria->order = 'id desc';
		$data=new CActiveDataProvider('Form',array('criteria' => $criteria));
		$this->render('admin',array(
			'data'=>$data,
		));
	}

	public function actionManagerAdmin()
	{
		$hierarchy = Hierarchy::model()->findAllByAttributes(array('manager_id' => Yii::app()->user->getEmployeeID()));
		$list = CHtml::ListData($hierarchy,'id','employee_id');
		$criteria = new CDbCriteria;
		$criteria->condition = 'status !=:stat1 AND status !=:stat2 AND status !=:stat3 AND status !=:stat4';
		$criteria->params = array(
						'stat1'=>'step1',
						'stat2'=>'step2',
						'stat3'=>'step3',
						'stat4'=>'step4',
						);
		$criteria->addInCondition('employee_id',$list);
		$criteria->order = 'id desc';
		$all = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'REQUEST_FOR_MANAGER_APPROVAL',
						);
		$criteria->addInCondition('employee_id',$list);
		$criteria->order = 'id desc';
		$request = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'CLOSED',
						);
		$criteria->addInCondition('employee_id',$list);
		$criteria->order = 'id desc';
		$closed = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'REJECTED',
						);
		$criteria->addInCondition('employee_id',$list);
		$criteria->order = 'id desc';
		$rejected = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$tabs = array(
			array('id' => 'tab1', 'label' => 'Menunggu Persetujuan Manager', 'content' => $this->renderPartial('_status', array('data' => $request), true)),
			array('id' => 'tab2', 'label' => 'Selesai', 'content' => $this->renderPartial('_status', array('data' => $closed), true)),
			array('id' => 'tab3', 'label' => 'Ditolak', 'content' => $this->renderPartial('_status', array('data' => $rejected), true)),
			array('id' => 'tab4', 'label' => 'Semua', 'content' => $this->renderPartial('_status', array('data' => $all), true)),
		);

		$this->render('manage_admin',array(
			'tabs'=>$tabs,
		));
	}

	public function actionFinanceAdmin()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'status !=:stat1 AND status !=:stat2 AND status !=:stat3 AND status !=:stat4';
		$criteria->params = array(
						'stat1'=>'step1',
						'stat2'=>'step2',
						'stat3'=>'step3',
						'stat4'=>'step4',
						);
		$criteria->order = 'id desc';
		$all = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'REQUEST_FOR_FINANCE_APPROVAL',
						);
		$criteria->order = 'id desc';
		$request = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'PAID',
						);
		$criteria->order = 'id desc';
		$paid = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'REQUEST_FOR_ACCOUNTABILITY_APPROVAL',
						);
		$criteria->order = 'id desc';
		$acc_req = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'CLOSED',
						);
		$criteria->order = 'id desc';
		$closed = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$criteria = new CDbCriteria;
		$criteria->condition = 'status =:stat';
		$criteria->params = array(
						'stat'=>'REJECTED',
						);
		$criteria->order = 'id desc';
		$rejected = new CActiveDataProvider('Form',array('criteria' => $criteria));

		$tabs = array(
			array('id' => 'tab1', 'label' => 'Menunggu Persetujuan Finance', 'content' => $this->renderPartial('_status', array('data' => $request), true)),
			array('id' => 'tab2', 'label' => 'Sudah Dibayar', 'content' => $this->renderPartial('_status', array('data' => $paid), true)),
			array('id' => 'tab3', 'label' => 'Pengajuan Pertanggungjawaban', 'content' => $this->renderPartial('_status', array('data' => $acc_req), true)),
			array('id' => 'tab4', 'label' => 'Selesai', 'content' => $this->renderPartial('_status', array('data' => $closed), true)),
			array('id' => 'tab5', 'label' => 'Ditolak', 'content' => $this->renderPartial('_status', array('data' => $rejected), true)),
			array('id' => 'tab6', 'label' => 'Semua', 'content' => $this->renderPartial('_status', array('data' => $all), true)),
		);

		$this->render('manage_admin',array(
			'tabs'=>$tabs,
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
}
