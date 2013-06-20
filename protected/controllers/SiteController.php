<?php
Yii::import('modfinance.models.*');
Yii::import('modhumanresources.models.*');

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		if(Yii::app()->user->isRole('finance->wilayah') && (!Yii::app()->user->isGuest) )
		{
			$employee_id = Yii::app()->user->getEmployeeID();
			
			$datakas= SetupUserKas::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>Yii::app()->user->getEmployeeID())));
			
			$databank= SetupUserBank::model()->findAll(array('condition'=>'employee_id=:x', 'params'=>array(':x'=>Yii::app()->user->getEmployeeID())));
			
			// $data = SetupUserKas::model()->findAll('condition'=>'employee_id=:x', 'params'=>array(':x'=>$employee_id));
			$datafiles = FilePublication::model()->findAll();
			
			$this->render('index',array('datakas'=>$datakas, 'databank'=>$databank, 'datafiles'=>$datafiles));
		}
		else
		{
			$datafiles = FilePublication::model()->findAll();
			
			$this->render('index', array('datafiles'=>$datafiles));
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			/**start testing**/
			// $model->attributes=$_POST['LoginForm'];
			// if ($model->validate() and $model->login()) 
			// {
				// $array = array('login' => 'success');
				// Yii::app()->user->setFlash('success', 'Successfully logged in.');
				// $json = json_encode($array);
				// echo $json;
				// Yii::app()->end();
			// } 
			// else 
			// {
				// echo CActiveForm::validate($model);
				// Yii::app()->end();
			// }
			/**end testing**/
			$model->attributes=$_POST['LoginForm'];	
			//profile only
			if($model->validate() && $model->login() && Yii::app()->user->isRole('hr->profile'))
			{
				$this->redirect(array('/modhumanresources/Employee/view/', 'id'=>Yii::app()->user->getEmployeeID()));
			}
			//end profile
			//validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	//email tes
	 public function actionMail()
      {

			$message = new YiiMailMessage();
			$message->setTo(array('hadi@pgas-solution.co.id'=>'Hadi'));
			$message->setFrom(array(Yii::app()->params['adminEmail']=>'Dwi Priyanto'));
			$message->setSubject("Test Sending Email from Automail");
			$message->setBody("This email is Working Bro wkakakaka");
			$numsent = Yii::app()->mail->send($message);
		   $this->render('index');

       }
	
	//end email tes
}