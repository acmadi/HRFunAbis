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
				'template'=>'{view}{viewLetterCost}',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/personnel/view", array("id"=>$data->id))',
	            		),
					'viewLetterCost'=>array(
	            		'htmlOptions'=>array('target'=>'blank'),
	            		'url'=>'Yii::app()->createUrl("modsppd/letterCost/view", array("employee_id"=>$data->employee_id))',
	            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/cost.png',
	            		),
					),
			),
		),
	)); ?>
</div>	