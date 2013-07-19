<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'personnel-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			// 'id',
			// 'sppd_id',
			'employee_id',
			'name',
			array(
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/personnel/view", array("id"=>$data->id))',
	            		),
	            	'update'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/personnel/update", array("id"=>$data->id))',
	            		),
	            	'delete'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/personnel/delete", array("id"=>$data->id))',
	            		),
					),
			),
		),
	)); ?>
</div>	