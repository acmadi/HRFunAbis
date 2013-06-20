<?php

class KasDcController extends RController
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
		$model=new KasDc;
		$model->currency = 'IDR';
		$model->credit = 0;
		if(isset(Yii::app()->session['kas']))
			$model->code_kas = Yii::app()->session['kas'];
			
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['KasDc']))
		{
			$model->attributes=$_POST['KasDc'];
			if($model->save())
			{
				$last_saldo = KasSaldo::model()->getLastAkumulasiSaldo($model->code_kas);
				$saldo = $last_saldo + $model->debit;
				$this->createSaldo($model->code_kas, $saldo, $model->debit, $model->transaction, $model->date);
				
				//$this->rekeningDebitFunction($model->credit, $model->currency, $model->code_kas);
				RekeningDc::model()->debitFunction($model->credit, $model->currency, $model->code_kas);
				
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function createSaldo($code_kas, $last_saldo, $amount, $transaction, $transac_date)
	{
		$sql="INSERT INTO `fin_kas_saldo`
					  (`id`, `code_kas`, `akumulasi_saldo`,`transaksi`, `description`, `date`, `transac_date`) 
				VALUES(NULL, :code_kas, :akumulasi_saldo, :transaksi, :description, :date, :transac_date)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$date_time =  date("Y-m-d H:i:s", time());
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":akumulasi_saldo",$last_saldo,PDO::PARAM_STR);
		$command->bindParam(":transaksi",$amount,PDO::PARAM_STR);
		$command->bindParam(":description",$transaction,PDO::PARAM_STR);
		$command->bindParam(":date",$date_time,PDO::PARAM_STR);
		$command->bindParam(":transac_date",$transac_date,PDO::PARAM_STR);

		$command->execute();	
	}
	
	// public function rekeningDebitFunction($value, $curr, $code)
	// {
		// $tes = new RekeningDc;
		// $tes->code_rek = $code;
		// $tes->debit = $value;
		// $tes->currency = $curr;
		// $tes->date = date('y-m-d', time());
		// $tes->save();
	// }

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

		if(isset($_POST['KasDc']))
		{
			$model->attributes=$_POST['KasDc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('KasDc');
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
		$dataProvider=new CActiveDataProvider('KasDc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		if(isset($_GET['kas']))
		{
			$session = Yii::app()->session;
			$session['kas'] = $_GET['kas'];
			unset(Yii::app()->session['bank']);
		}
		//unset cookies
		unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
		unset(Yii::app()->request->cookies['to_date']);
		
		$model=new KasDc('search');
		$model->unsetAttributes();  // clear any default values
		
		//date between
		if(!empty($_POST))
		{
			Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
			Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
			
			$model->from_date = $_POST['from_date'];
			$model->to_date = $_POST['to_date'];
		}
		
		//end date between
		
		if(isset($_GET['KasDc']))
			$model->attributes=$_GET['KasDc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionLaporanKas()
	{
		if(isset($_GET['from_date']))
		{
			//$model->attributes = $_GET['KasDc'];
			$session = Yii::app()->session;
			$session['code_kas'] = $_GET['code_kas'];
			$session['from_date'] = $_GET['from_date'];
			$session['to_date'] = $_GET['to_date'];
			
			
			$criteria = new CDbCriteria();
			$criteria->condition = 't.code_kas = :code_kas AND t.date BETWEEN :from_date AND :to_date AND elbi != ""';
			$criteria->params = array(
			  ':code_kas' =>Yii::app()->session['code_kas'],// $_GET['code_kas'],
			  ':from_date' => Yii::app()->session['from_date'],//$_GET['from_date'],
		      ':to_date' => Yii::app()->session['to_date'],//$_GET['to_date'],
			);
			
			$criteria->order = 'elbi ASC';
			
			$kasdc = KasDc::model()->findAll($criteria);
			
			$this->render('reports/laporankas',array(
				'kasdc'=>$kasdc,
			));
		}
		else
		{
			// $criteria = new CDbCriteria();
			// $criteria->order = 'elbi ASC';
			// $kasdc = KasDc::model()->findAll($criteria);
			
			$this->render('reports/laporankas', array());//'kasdc' => $kasdc));
		}
		/*
		$model=new KasDc('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['KasDc']))
			$model->attributes=$_GET['KasDc'];

		$this->render('reports/laporankas',array(
			'model'=>$model,
		));
		*/
	}
	
	public function actionLaporanKasPdf()
	{
		/*
		$model=new KasDc('search');
		$model->unsetAttributes();  // clear any default values
		*/
		$criteria = new CDbCriteria();
		$criteria->condition = 't.code_kas = :code_kas AND t.date BETWEEN :from_date AND :to_date AND elbi != ""';
		$criteria->params = array(
		  ':code_kas' =>Yii::app()->session['code_kas'],// $_GET['code_kas'],
		  ':from_date' => Yii::app()->session['from_date'],//$_GET['from_date'],
		  ':to_date' => Yii::app()->session['to_date'],//$_GET['to_date'],
		);
		
		$criteria->order = 'elbi ASC';
		
		$kasdc = KasDc::model()->findAll($criteria);
		
		$mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderPartial('reports/laporankaspdf',array('kasdc'=>$kasdc,), true));
        $mPDF1->Output();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=KasDc::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='rekening-dc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
