<?php

class RekeningDcController extends RController
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
		$model=new RekeningDc;
		$model->currency = 'IDR';
		
		if(isset(Yii::app()->session['bank']))
			$model->nomor_rek = Yii::app()->session['bank'];
			
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['RekeningDc']))
		{
			$model->attributes=$_POST['RekeningDc'];
			$model->akun = Rekening::model()->getAkun($model->nomor_rek);
			$model->kode_pembantu = Rekening::model()->getKodePembantu($model->nomor_rek);
			if($model->save())
			{
				//get akumulasi saldo 
				$last_saldo = RekeningSaldo::model()->getLastAkumulasiSaldo($model->nomor_rek);
				$saldo = $last_saldo + $model->debit;
				$this->createSaldo($model->nomor_rek, $saldo, $model->debit, $model->description, $model->date);
				
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function createSaldo($nomor_rek, $last_saldo, $amount, $description, $transac_date)
	{
		$sql="INSERT INTO `fin_rekening_saldo`
					  (`id`, `nomor_rek`, `akumulasi_saldo`,`transaksi`, `description`, `transac_date`, `date`) 
				VALUES(NULL, :nomor_rek, :akumulasi_saldo, :transaksi, :description, :transac_date, :date)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$date_time =  date("Y-m-d H:i:s", time());
		
		$command->bindParam(":nomor_rek",$nomor_rek,PDO::PARAM_STR);
		$command->bindParam(":akumulasi_saldo",$last_saldo,PDO::PARAM_STR);
		$command->bindParam(":transaksi",$amount,PDO::PARAM_STR);
		$command->bindParam(":description",$description,PDO::PARAM_STR);
		$command->bindParam(":transac_date",$transac_date,PDO::PARAM_STR);
		$command->bindParam(":date",$date_time,PDO::PARAM_STR);

		$command->execute();	
	}
	
	public function actionTarikBank()
	{
		$model=new RekeningDc;
		$model->currency = 'IDR';
		
		if(isset(Yii::app()->session['bank']))
			$model->nomor_rek = Yii::app()->session['bank'];
			
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['RekeningDc']))
		{
			$model->attributes=$_POST['RekeningDc'];
			$model->akun = Rekening::model()->getAkun($model->nomor_rek);
			$model->kode_pembantu = Rekening::model()->getKodePembantu($model->nomor_rek);
			if($model->save())
			{
				//get akumulasi saldo 
				$last_saldo = RekeningSaldo::model()->getLastAkumulasiSaldo($model->nomor_rek);
				$saldo = $last_saldo - $model->credit;
				
				$this->createSaldo($model->nomor_rek, $saldo, -($model->credit), $model->description, $model->date);
				
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('pull',array(
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
		static $flag = 'flag'; //notes : flag ini digunakan agar update ke saldo stabil, klo g ada ini jadi double record, belum tau sebabnye
		
		$model=$this->loadModel($id);
		$old_debit = $model->debit;
		$old_credit = $model->credit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RekeningDc']))
		{
			$model->attributes=$_POST['RekeningDc'];
			
			if($model->save())
			{
				if($flag == 'flag')
					RekeningSaldo::model()->updateSaldo($id, $old_debit, $old_credit);
				$flag = 'unflag';
				
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
			}
			
		}
		else
		{
			$this->render('update',array(
				'model'=>$model,
			));
		}	
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('RekeningDc');
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
		$dataProvider=new CActiveDataProvider('RekeningDc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(isset($_GET['bank']))
		{
			$session = Yii::app()->session;
			$session['bank'] = $_GET['bank'];
			unset(Yii::app()->session['kas']);
		}
		
		$model=new RekeningDc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekeningDc']))
			$model->attributes=$_GET['RekeningDc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	public function actionLaporanBank()
	{
		if(isset($_GET['from_date']))
		{
			//$model->attributes = $_GET['KasDc'];
			$session = Yii::app()->session;
			$session['nomor_rek'] = $_GET['nomor_rek'];
			$session['from_date'] = $_GET['from_date'];
			$session['to_date'] = $_GET['to_date'];
			
			
			$criteria = new CDbCriteria();
			$criteria->condition = 't.nomor_rek = :nomor_rek AND t.date BETWEEN :from_date AND :to_date';
			$criteria->params = array(
			  ':nomor_rek' =>Yii::app()->session['nomor_rek'],
			  ':from_date' => Yii::app()->session['from_date'],
		      ':to_date' => Yii::app()->session['to_date'],
			);
			$criteria->order = 'date ASC';
			
			$rekdc = RekeningDc::model()->findAll($criteria);
			
			$saldo_akhir = RekeningSaldo::model()->getLastAkumulasiSaldo(Yii::app()->session['nomor_rek']);
			
			$this->render('reports/laporanbank',array(
				'rekdc'=>$rekdc,
				'saldo_akhir'=>$saldo_akhir,
			));
		}
		else
		{
			// $criteria = new CDbCriteria();
			// $criteria->order = 'date ASC';
			// $rekdc = RekeningDc::model()->findAll($criteria);
			
			// $saldo_akhir = RekeningSaldo::model()->getLastAkumulasiSaldo(Yii::app()->session['nomor_rek']);
			
			$this->render('reports/laporanbank',array(
				// 'rekdc'=>$rekdc,
				// 'saldo_akhir'=>$saldo_akhir,
			));
		}
		
		/*
		$model=new RekeningDc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekeningDc']))
			$model->attributes=$_GET['RekeningDc'];

		$this->render('reports/laporanbank',array(
			'model'=>$model,
		));
		*/
	}
	
	public function actionLaporanBankPdf()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 't.nomor_rek = :nomor_rek AND t.date BETWEEN :from_date AND :to_date';
		$criteria->params = array(
		  ':nomor_rek' =>Yii::app()->session['nomor_rek'],// $_GET['code_kas'],
		  ':from_date' => Yii::app()->session['from_date'],//$_GET['from_date'],
		  ':to_date' => Yii::app()->session['to_date'],//$_GET['to_date'],
		);
		
		$criteria->order = 'nomor_rek ASC';
		
		$saldo_akhir = RekeningSaldo::model()->getLastAkumulasiSaldo(Yii::app()->session['nomor_rek']);
		$rekdc = RekeningDc::model()->findAll($criteria);
		
		$mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderPartial('reports/laporanbankpdf',array('rekdc'=>$rekdc,'saldo_akhir'=>$saldo_akhir), true));
        $mPDF1->Output();
	}
	
	public function actionBukuBank()
	{
		if(isset($_GET['from_date']))
		{
			//$model->attributes = $_GET['KasDc'];
			$session = Yii::app()->session;
			$session['nomor_rek'] = $_GET['nomor_rek'];
			$session['from_date'] = $_GET['from_date'];
			$session['to_date'] = $_GET['to_date'];
			
			
			$criteria = new CDbCriteria();
			$criteria->condition = 't.nomor_rek = :nomor_rek AND t.date BETWEEN :from_date AND :to_date';
			$criteria->params = array(
			  ':nomor_rek' =>Yii::app()->session['nomor_rek'],
			  ':from_date' => Yii::app()->session['from_date'],
		      ':to_date' => Yii::app()->session['to_date'],
			);
			$criteria->order = 'date ASC';
			
			$buku = RekeningSaldo::model()->findAll($criteria);
			
			$this->render('reports/bukubank',array(
				'buku'=>$buku,
			));
		}
		else
		{
			// $criteria = new CDbCriteria();
			// $criteria->order = 'date ASC';
			// $buku = RekeningSaldo::model()->findAll($criteria);
			
			$this->render('reports/bukubank', array());//'buku' => $buku));
		}
		
		/*
		$model=new RekeningDc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RekeningDc']))
			$model->attributes=$_GET['RekeningDc'];

		$this->render('reports/laporanbank',array(
			'model'=>$model,
		));
		*/
	}
	
	public function actionBukuBankPdf()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 't.nomor_rek = :nomor_rek AND t.date BETWEEN :from_date AND :to_date';
		$criteria->params = array(
		  ':nomor_rek' =>Yii::app()->session['nomor_rek'],
		  ':from_date' => Yii::app()->session['from_date'],
		  ':to_date' => Yii::app()->session['to_date'],
		);
		$criteria->order = 'date ASC';
		
		$buku = RekeningSaldo::model()->findAll($criteria);
		
		$mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
        $mPDF1->WriteHTML($this->renderPartial('reports/bukubankpdf',array('buku'=>$buku), true));
        $mPDF1->Output();
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=RekeningDc::model()->findByPk($id);
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
