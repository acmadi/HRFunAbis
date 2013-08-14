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
			$persekot2 = Persekot::model()->find(array('condition'=>'sppd_id=:x AND flag=:y', 'params'=>array(':x'=>$id, ':y'=>'lpj1')));
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
		$persekot = Persekot::model()->findByAttributes(array('sppd_id'=>$model->id));
		if ($model->status == 'PAID') {
			$model->setStatus('ON_PROCESS', '-', 'System');
			if ($persekot) {
				$persekot2 = Persekot::model()->createPersekot($id, 'lpj1');
				PersekotDetail::model()->createPersekotDetail($persekot2->id, 'Persekot', 0, $persekot2->amount);
				$persekot3 = Persekot::model()->createPersekot($id,'lpj2');
			}
			if ($model->sppd_type != 'Dinas') {
				RealNondinas::model()->generateRealNonDinas($id);
				if ($persekot) {
					$rab = RABNonDinas::model()->findAllByAttributes(array('sppd_id'=>$id));
					foreach ($rab as $item) {
						PersekotDetail::model()->createPersekotDetail($persekot3->id, $item->explanation,0,$item->amount, $item->name);
					}
				}
			} else {
				LetterCost::model()->generateLetterCost($id);
				if ($persekot) {
					$rab = RABDinas::model()->findAllByAttributes(array('sppd_id'=>$id));
					foreach ($rab as $item) {
						PersekotDetail::model()->createPersekotDetail($persekot3->id, $item->cost_description,0,$item->amount, $item->name);
					}
				}
			}
		}
		$this->redirect(array('view','id'=>$id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id = null)
	{
		$model=($id == null)? new Form: $this->loadModel($id);
		if ($model->status == 'step2' || $model->status == 'step3' || $model->status == 'step4') {
			if(isset($_POST['Form']))
			{
				$model->attributes=$_POST['Form'];
				$model->created_by = Employee::model()->getName(Yii::app()->user->getEmployeeID());
				$model->created_date = date('Y-m-d',time());
				if($model->save())
					$this->redirect(array('createStep2','id'=>$model->id));
			}
		} else {
			$model->employee_id = Yii::app()->user->getEmployeeID();
			$model->name = Employee::model()->getName(Yii::app()->user->getEmployeeID());
			$model->service_provider = 'PGN SOLUTION';
			$model->unit = 'PGN SOLUTION';


			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Form']))
			{
				$model->attributes=$_POST['Form'];
				$model->created_by = Employee::model()->getName(Yii::app()->user->getEmployeeID());
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
						'stat'=>'FINANCE_VALIDATED',
						);
		$criteria->order = 'id desc';
		$unpaid = new CActiveDataProvider('Form',array('criteria' => $criteria));

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
			array('id' => 'tab2', 'label' => 'Belum Dibayar', 'content' => $this->renderPartial('_status', array('data' => $unpaid), true)),
			array('id' => 'tab3', 'label' => 'Sudah Dibayar', 'content' => $this->renderPartial('_status', array('data' => $paid), true)),
			array('id' => 'tab4', 'label' => 'Pengajuan Pertanggungjawaban', 'content' => $this->renderPartial('_status', array('data' => $acc_req), true)),
			array('id' => 'tab5', 'label' => 'Selesai', 'content' => $this->renderPartial('_status', array('data' => $closed), true)),
			array('id' => 'tab6', 'label' => 'Ditolak', 'content' => $this->renderPartial('_status', array('data' => $rejected), true)),
			array('id' => 'tab7', 'label' => 'Semua', 'content' => $this->renderPartial('_status', array('data' => $all), true)),
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

	public function actionReport($filter = 'BY_EMPLOYEE', $download = null)
	{
		$totalAmount = 0;
		$totalRemains = 0;
		if (($filter == 'BY_EMPLOYEE' || $download == 'BY_EMPLOYEE') && isset($_GET['employee_id'])) {
			// BY_EMPLOYEE
			$criteria = new CDbCriteria;
			$criteria->condition = 'employee_id =:empid';
			$criteria->params = array(
								':empid'=>$_GET['employee_id'],
								);
			$sppd = new CActiveDataProvider('Form',array('criteria' => $criteria));
			foreach ($sppd->getData() as $item) {
				$totalAmount += $item->getTotal();
				$totalRemains += $item->getRemains();
			}

			if ($download == 'BY_EMPLOYEE') {
				$this->downloadReport($sppd, 'BY_EMPLOYEE', $totalAmount, $totalRemains);
			}

			$this->render('report',array(
				'data'=>$sppd,
				'totalAmount' => $totalAmount,
				'totalRemains' => $totalRemains,
				'tab'=>1,
			));
		} elseif (($filter == 'BY_DEPARTMENT' || $download == 'BY_DEPARTMENT') && isset($_GET['department'])) {
			// BY_DEPARTMENT
			$employees = CHtml::ListData(Employee::model()->findAllByAttributes(array('department' => $_GET['department'])),'employee_id','employee_id');
			$criteria = new CDbCriteria;
			$criteria->addInCondition('employee_id',$employees);
			$criteria->order = 'name asc';
			$sppd = new CActiveDataProvider('Form',array('criteria' => $criteria));
			foreach ($sppd->getData() as $item) {
				$totalAmount += $item->getTotal();
				$totalRemains += $item->getRemains();
			}

			if ($download == 'BY_DEPARTMENT') {
				$info = array(
					'department' => $_GET['department'],
					);
				$this->downloadReport($sppd, 'BY_DEPARTMENT', $totalAmount, $totalRemains, $info);
			}

			$this->render('report',array(
				'data'=>$sppd,
				'totalAmount' => $totalAmount,
				'totalRemains' => $totalRemains,
				'tab'=>2,
			));	
		} elseif (($filter == 'BY_PERIOD' || $download == 'BY_PERIOD') && isset($_GET['from_date']) && isset($_GET['to_date'])) {
			// BY PERIOD
			$criteria = new CDbCriteria;
			$criteria->condition = 'departure between :from AND :to';
			$criteria->params = array(
								':from'=>$_GET['from_date'],
								':to'=>$_GET['to_date'],
								);
			$criteria->order = 'name asc';
			$sppd = new CActiveDataProvider('Form',array('criteria' => $criteria));
			foreach ($sppd->getData() as $item) {
				$totalAmount += $item->getTotal();
				$totalRemains += $item->getRemains();
			}

			if ($download == 'BY_PERIOD') {
				$info = array(
					'from_date' => $_GET['from_date'],
					'to_date' => $_GET['to_date'],
					 );
				$this->downloadReport($sppd, 'BY_PERIOD', $totalAmount, $totalRemains, $info);
			}

			$this->render('report',array(
				'data'=>$sppd,
				'totalAmount' => $totalAmount,
				'totalRemains' => $totalRemains,
				'tab'=>3,
			));
		} else {
			$this->render('report',array(
				'tab'=>1,
			));
		}		
	}

	public function downloadReport($data, $filter, $totalAmount, $totalRemains, $info = null)
	{
		$data = $data->getData();
        XPHPExcel::init();

        $objPHPExcel = XPHPExcel::createPHPExcel();

        // Styling
        $allBorder = array(
        	'borders' => array(
        		'allborders' => array(
        			'style' => PHPExcel_Style_Border::BORDER_THIN,
        			'color' => array('argb' => 'FF000000'),
        			),
        		),
        	);
        
        // TITLE
        if ($filter == 'BY_EMPLOYEE') {
	        // Rename worksheet
	        $objPHPExcel->setActiveSheetIndex(0)->setTitle('SPPD Berdasarkan Pegawai');
	        // merge cell
    		$objPHPExcel->getActiveSheet()->mergeCells('B2:J3');
    		$objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
    		$objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
    		// styling
    		$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
    			->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()
    			->setBold(true)
    			->setSize(16);
			$objPHPExcel->getActiveSheet()->getStyle('B5:B6')->getFont()
    			->setBold(true)
    			->getColor()->setARGB('FFFFFFFF');
    		$objPHPExcel->getActiveSheet()->getStyle('B5:C6')->getFill()
    			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    			->getStartColor()
    			->setARGB('FF00B0F0');
    		$objPHPExcel->getActiveSheet()->getStyle('D5:D6')->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    		$objPHPExcel->getActiveSheet()->getStyle('B5:D6')->applyFromArray($allBorder);

    		// add data
    		$objPHPExcel->getActiveSheet()
    			->setCellValue('B2', 'REKAPITULASI SURAT PERINTAH PERJALANAN DINAS (SPPD)')
    			->setCellValue('B5', 'No. Pegawai')
    			->setCellValue('B6', 'Nama')
    			->setCellValue('D5', $data[0]->employee_id)
    			->setCellValue('D6', $data[0]->name);

        } elseif ($filter == 'BY_DEPARTMENT') {
        	// Rename worksheet
	        $objPHPExcel->getActiveSheet()->setTitle('SPPD Berdasarkan Departemen');
	        // merge cell
    		$objPHPExcel->getActiveSheet()->mergeCells('B2:K3');
    		$objPHPExcel->getActiveSheet()->mergeCells('B4:K4');
    		// styling
    		$objPHPExcel->getActiveSheet()->getStyle('B2:B4')->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
    			->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()
    			->setBold(true)
    			->setSize(16);
    		$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()
    			->setBold(true);
    		// add data
    		$objPHPExcel->getActiveSheet()
    			->setCellValue('B2', 'REKAPITULASI SURAT PERINTAH PERJALANAN DINAS (SPPD)')
    			->setCellValue('B4', 'Departemen '. $info['department']);
        } elseif ($filter == 'BY_PERIOD') {
        	// Rename worksheet
	        $objPHPExcel->getActiveSheet()->setTitle('SPPD Berdasarkan Periode');
	        // merge cell
    		$objPHPExcel->getActiveSheet()->mergeCells('B2:K3');
    		$objPHPExcel->getActiveSheet()->mergeCells('B4:K4');
    		// styling
    		$objPHPExcel->getActiveSheet()->getStyle('B2:B4')->getAlignment()
    			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
    			->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
    		$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()
    			->setBold(true)
    			->setSize(16);
    		$objPHPExcel->getActiveSheet()->getStyle('B4')->getFont()
    			->setBold(true);
    		// add data
    		$objPHPExcel->getActiveSheet()
    			->setCellValue('B2', 'REKAPITULASI SURAT PERINTAH PERJALANAN DINAS (SPPD)')
    			->setCellValue('B4', 'Periode '. date('d/m/Y',strtotime($info['from_date'])).' - '.date('d/m/Y',strtotime($info['to_date'])));
        }

        // DATA HEADER
        // styling
        $headerCells = ($filter == 'BY_EMPLOYEE')?'B8:J8':'B7:K7';
        $objPHPExcel->getActiveSheet()->getStyle($headerCells)->getAlignment()
			->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle($headerCells)->getFont()
			->setBold(true)
			->setSize(12)
			->getColor()->setARGB('FFFFFFFF');
		$objPHPExcel->getActiveSheet()->getStyle($headerCells)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FF00B0F0');
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
    	// add data
		if ($filter == 'BY_EMPLOYEE') {
			$objPHPExcel->getActiveSheet()
				->setCellValue('B8', 'No')
				->setCellValue('C8', 'Kota')
				->setCellValue('D8', 'Tujuan')
				->setCellValue('E8', 'Berangkat')
				->setCellValue('F8', 'Pulang')
				->setCellValue('G8', 'Tipe SPPD')
				->setCellValue('H8', 'Status')
				->setCellValue('I8', 'Jumlah')
				->setCellValue('J8', 'Kembali');
		} else {
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()
				->setCellValue('B7', 'No')
				->setCellValue('C7', 'Nama')
				->setCellValue('D7', 'Kota')
				->setCellValue('E7', 'Tujuan')
				->setCellValue('F7', 'Berangkat')
				->setCellValue('G7', 'Pulang')
				->setCellValue('H7', 'Tipe SPPD')
				->setCellValue('I7', 'Status')
				->setCellValue('J7', 'Jumlah')
				->setCellValue('K7', 'Kembali');
		}

		// // Set Border
		// $objPHPExcel->getActiveSheet()->getStyle($headerCells)->applyFromArray($allBorder);

		// DATA BODY
		$offset = ($filter == 'BY_EMPLOYEE')?9:8;

		// Loop Data
		$i = 0;
		$number = 1;
		foreach ($data as $row) {
			if ($filter == 'BY_EMPLOYEE') {
				$objPHPExcel->getActiveSheet()
					->setCellValue('B'.($i + $offset), $number)
					->setCellValue('C'.($i + $offset), $row->destination)
					->setCellValue('D'.($i + $offset), $row->purpose)
					->setCellValue('E'.($i + $offset), date('d/m/Y',strtotime($row->departure)))
					->setCellValue('F'.($i + $offset), date('d/m/Y',strtotime($row->arrival)))
					->setCellValue('G'.($i + $offset), $row->sppd_type)
					->setCellValue('H'.($i + $offset), $row->status)
					->setCellValue('I'.($i + $offset), $row->getTotal())
					->setCellValue('J'.($i + $offset), $row->getRemains());
			} else {
				$objPHPExcel->getActiveSheet()
					->setCellValue('B'.($i + $offset), $number)
					->setCellValue('C'.($i + $offset), $row->name)
					->setCellValue('D'.($i + $offset), $row->destination)
					->setCellValue('E'.($i + $offset), $row->purpose)
					->setCellValue('F'.($i + $offset), date('d/m/Y',strtotime($row->departure)))
					->setCellValue('G'.($i + $offset), date('d/m/Y',strtotime($row->arrival)))
					->setCellValue('H'.($i + $offset), $row->sppd_type)
					->setCellValue('I'.($i + $offset), $row->status)
					->setCellValue('J'.($i + $offset), $row->getTotal())
					->setCellValue('K'.($i + $offset), $row->getRemains());
			}
			$i++;
			$number++;
		}


		// FOOTER
		$footerCellsLeft = ($filter == 'BY_EMPLOYEE')?'B'.($offset+$i).':G'.($offset+$i):'B'.($offset+$i).':H'.($offset+$i);
		$footerCellsRight = ($filter == 'BY_EMPLOYEE')?'H'.($offset+$i).':J'.($offset+$i):'I'.($offset+$i).':K'.($offset+$i);
		// Merge Cells
		$objPHPExcel->getActiveSheet()->mergeCells($footerCellsLeft);
		// Styling
		$objPHPExcel->getActiveSheet()->getStyle($footerCellsLeft)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()
			->setARGB('FF00B0F0');
		$objPHPExcel->getActiveSheet()->getStyle($footerCellsRight)->getFont()
    			->setBold(true);

		// Add Footer Data
    	if ($filter == 'BY_EMPLOYEE') {
			$objPHPExcel->getActiveSheet()
				->setCellValue('H'.($i + $offset), 'Total')
				->setCellValue('I'.($i + $offset), $totalAmount)
				->setCellValue('J'.($i + $offset), $totalRemains);
    	} else {
    		$objPHPExcel->getActiveSheet()
				->setCellValue('I'.($i + $offset), 'Total')
				->setCellValue('J'.($i + $offset), $totalAmount)
				->setCellValue('K'.($i + $offset), $totalRemains);
    	}

    	// Numbering Format
    	if ($filter == 'BY_EMPLOYEE') {
    		$objPHPExcel->getActiveSheet()
        		->getStyle('I'.($offset).':J'.($offset+$number))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
    	} else {
    		$objPHPExcel->getActiveSheet()
        		->getStyle('J'.($offset).':K'.($offset+$number))
        		->getNumberFormat()
        		->setFormatCode('[>=0]#,##0;[<0](#,##0)');
    	}

		// SET TABLE BORDER
		$tableCells = ($filter == 'BY_EMPLOYEE')?'B'.($offset-1).':J'.($offset+$i):'B'.($offset-1).':K'.($offset+$i);
		$objPHPExcel->getActiveSheet()->getStyle($tableCells)->applyFromArray($allBorder);
        
        // Save a xls file
        $filename = 'Report_['.date('d-m-Y',time()).']';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');
	}
}
