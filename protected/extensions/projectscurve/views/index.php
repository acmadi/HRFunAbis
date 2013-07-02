<?php 
$this->widget('application.extensions.EFlot.EFlotGraphWidget', 
    array(
        'data'=>array(
            array(
                'label'=> 'line 1', 
                'data'=>$line1,
                'lines'=>array('show'=>true, 'fill'=>true),
                'points'=>array('show'=>true),
            ),
			array(
                'label'=> 'line 2', 
                'data'=>$line2,
                'lines'=>array('show'=>true, 'fill'=>true),
                'points'=>array('show'=>true),
            ),	
        ),
		
        'options'=>array(
                'legend'=>array(
                    'position'=>'nw',
                    'show'=>true,
                    'margin'=>10,
                    'backgroundOpacity'=> 0.1
                    ),
        ),
        'htmlOptions'=>array(
               'style'=>'width:auto;height:400px;'
        )
    )
);

?>

<?php
	// $this->Widget('ext.ActiveHighcharts.HighchartsWidget', array(
		// 'dataProvider'=>$dataProvider,
		// 'template'=>'{items}',
		// 'options'=> array(
			// 'title'=>array(
				// 'text'=>'S Curve'
			// ),
			// 'xAxis'=>array(
				// // It cant be 1.a self-defined xAxis array as you want; 
				// // 2.a series from datebase such as time series
				// "categories"=>'period_week'            
			// ),
			// 'series'=>array(
				// array(
					// 'type'=>'line',
					// 'name'=>'Actual',             //title of data
					// 'dataResource'=>'progress_actual',     //data resource according to datebase column
				// ),
				// array(
					// 'type'=>'line',
					// 'name'=>'Plan',             //title of data
					// 'dataResource'=>'progress_plan',     //data resource according to datebase column
				// )
			// )
		// )
	// ));
?>

