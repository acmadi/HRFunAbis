<?php
class ProjectSCurve extends CWidget{
	private $quotes;

	public function init(){
	}

	public function run(){
		
		
		$criteria=new CDbCriteria;
        $criteria->condition = "project_number >= :x";
		$criteria->params = array (
			':x' => Yii::app()->session['project_number'],
		);

	
		// $dataProvider=new CActiveDataProvider('Progress',
            // array(
                // 'criteria'=>$criteria,
            // )
        // );
 
		$data = Progress::model()->findAll($criteria);
		
		$line1 = array();
		$line2 = array();
		
		foreach ($data as $dt) 
		{
		  $line1[]=array($dt->period_week, $dt->progress_actual);
		  $line2[]=array($dt->period_week, $dt->progress_plan);
		}
		
		$this->render('index', array('line1'=>$line1, 'line2'=>$line2));
		
        // //json formatted ajax response to request
        // if(isset($_GET['json']) && $_GET['json'] == 1)
		// {
            // $count = ChartData::model()->count();
            // for($i=1; $i<=$count; $i++)
			// {
                // $data = ChartData::model()->findByPk($i);
                // $data->data += rand(-10,10);
                // $data->save();
            // }
            // echo CJSON::encode($dataProvider->getData());
        // }
		// else
		// {
			// $this->render('index', array('dataProvider'=>$dataProvider));
        // }
	}
}
