<?php
class ProjectStatus extends CWidget{
	public $number;

	public function init(){

	}

	public function run(){
		$criteria = new CDbCriteria;
		if (!Yii::app()->user->isRole('Super->Super->Project')) {
			$criteria->compare('pic',Yii::app()->user->getEmployeeID(),true);
		}
		$project = Project::model()->findAll($criteria);

		//tampilkan
		$this->render('index', array('project'=>$project));
	}
}
