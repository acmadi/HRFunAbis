<?php

class KasExpenseController extends RController
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
		$model=new KasExpense;
		$model->status = 'UF';//un ferified
		$model->currency = 'IDR';//un ferified
		$model->date= date('Y-m-d', time());//un ferified
		
		if(isset(Yii::app()->session['kas']))
			$model->code_kas = Yii::app()->session['kas'];
			
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['KasExpense']))
		{
			$model->attributes=$_POST['KasExpense'];
			
			if($model->save())
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['KasExpense']))
		{
			$model->attributes=$_POST['KasExpense'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionAjaxupdate()
	{
		$es = new EditableSaver('KasExpense');
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
	
	public function actionBatchSubmit()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		 
		if(isset($_POST['id']) && $_POST['id']!=='')
		{
			foreach($_POST['id'] as $key=>$val)
			{
				$this->submit($val);
		    }
			Yii::app()->user->setFlash('success','<strong>Berhasil</strong> Anda berhasil submit.');
		}
		else
			Yii::app()->user->setFlash('error','<strong>Gagal</strong> Anda belum memilih data untuk di submit.');
		$this->redirect(array('admin'));
	}
	
	public function submit($id)
	{
		$status = 'UF'; //status un ferified
		
		$model = $this->loadModel($id);//KasExpense::model()->findAll(array('condition'=>'status=:x', 'params'=>array(':x'=>$status)));
		$model->status = 'AF';
		if($model->update())
		{
			KasDc::model()->debitFunction($model->code_kas, $model->elbi, $model->date, $model->transaction, $model->amount, $model->ppn, $model->pph21, $model->pph23, $model->currency, $model->created_date, $model->created_by);
			
			$last_saldo = KasSaldo::model()->getLastAkumulasiSaldo($model->code_kas);
			
			$saldo = ($last_saldo - $model->amount);
			
			$this->createSaldo($model->code_kas, $saldo, -($model->amount), $model->transaction, $model->date);
			
			if($model->ppn >0)
			{
				$last_saldo1 = KasSaldo::model()->getLastAkumulasiSaldo($model->code_kas);
			
				$saldo1 = ($last_saldo1 - $model->ppn);
			
				$this->createSaldo($model->code_kas, $saldo1, -($model->ppn), 'PPN - '.$model->transaction, $model->date);
			}
			if($model->pph21 >0)
			{
				$last_saldo2 = KasSaldo::model()->getLastAkumulasiSaldo($model->code_kas);
			
				$saldo2 = ($last_saldo2 + $model->pph21);
			
				$this->createSaldo($model->code_kas, $saldo2, ($model->pph21), 'PPH 21 - '.$model->transaction, $model->date);
			}
			if($model->pph23 >0)
			{
				$last_saldo3 = KasSaldo::model()->getLastAkumulasiSaldo($model->code_kas);
			
				$saldo3 = ($last_saldo3 + $model->pph23);
			
				$this->createSaldo($model->code_kas, $saldo3, ($model->pph23), 'PPH 23 - '.$model->transaction, $model->date);
			}	
		}
		
		// foreach($expenses as $ex)
		// {
			// $ex->status = 'AF';	
			// $ex->update();
			
			// KasDc::model()->debitFunction($ex->code_kas, $ex->elbi, $ex->date, $ex->transaction, $ex->amount, $ex->ppn, $ex->pph, $ex->currency, $ex->created_date, $ex->created_by);	
		// }
		
		//$this->redirect(array('admin'));
	}

	public function createSaldo($code_kas, $last_saldo, $amount, $transaction, $transac_date)
	{
		$sql="INSERT INTO `fin_kas_saldo`
					  (`id`, `code_kas`, `akumulasi_saldo`,`transaksi`, `description`, `transac_date`, `date`) 
				VALUES(NULL, :code_kas, :akumulasi_saldo, :transaksi, :description, :transac_date, :date)";
				
		$command=Yii::app()->db->createCommand($sql);
		
		$date_time =  date("Y-m-d H:i:s", time());
		
		$command->bindParam(":code_kas",$code_kas,PDO::PARAM_STR);
		$command->bindParam(":akumulasi_saldo",$last_saldo,PDO::PARAM_STR);
		$command->bindParam(":transaksi",$amount,PDO::PARAM_STR);
		$command->bindParam(":description",$transaction,PDO::PARAM_STR);
		$command->bindParam(":transac_date",$transac_date,PDO::PARAM_STR);
		$command->bindParam(":date",$date_time,PDO::PARAM_STR);

		$command->execute();	
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('KasExpense');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new KasExpense('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KasExpense']))
			$model->attributes=$_GET['KasExpense'];

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
		$model=KasExpense::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='kas-expense-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
