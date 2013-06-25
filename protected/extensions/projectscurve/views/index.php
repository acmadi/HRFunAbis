<?php
	// $this->beginWidget('zii.widgets.CPortlet', array(
		// 'title'=>"Project Status",
	// ));
?>

	<?php
		$this->Widget('ext.ActiveHighcharts.HighchartsWidget', array(
			'dataProvider'=>$dataProvider,
			'template'=>'{items}',
			'options'=> array(
				'title'=>array(
					'text'=>'S Curve'
				),
				'xAxis'=>array(
					// It cant be 1.a self-defined xAxis array as you want; 
					// 2.a series from datebase such as time series
					"categories"=>'period_week'            
				),
				'series'=>array(
					array(
						'type'=>'line',
						'name'=>'Progress',             //title of data
						'dataResource'=>'progress_actual',     //data resource according to datebase column
					)
				)
			)
		));
	?>

		
<?php //$this->endWidget();?>	
