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

	
		$dataProvider=new CActiveDataProvider('Progress',
            array(
                'criteria'=>$criteria,
            )
        );
 
        //json formatted ajax response to request
        if(isset($_GET['json']) && $_GET['json'] == 1)
		{
            $count = ChartData::model()->count();
            for($i=1; $i<=$count; $i++)
			{
                $data = ChartData::model()->findByPk($i);
                $data->data += rand(-10,10);
                $data->save();
            }
            echo CJSON::encode($dataProvider->getData());
        }
		else
		{
			$this->render('index', array('dataProvider'=>$dataProvider));
			
            // $this->render('ChartView',array(
                    // 'dataProvider'=>$dataProvider,
            // ));
        }
		
		//$progress = Progress::model()->findAll(array('condition'=>'project_number=:x', 'params'=>array(':x'=>Yii::app()->session['project_number'])));
		
		//tampilkan
		//$this->render('index', array('progress'=>$progress));
	}
}
