<div class="span12">
	<?php
		$sppd = Form::model()->findByPk($data->getData()[0]->sppd_id);
		$sppdStatus = $sppd->status;
		$sppdType = $sppd->sppd_type;
	?>

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
				'template'=>($sppdType == 'Dinas' && ($sppdStatus != 'ON_PROCESS' && $sppdStatus != 'REQUEST_FOR_ACCOUNTABILITY_APPROVAL' && $sppdStatus != 'ACCOUNTABILITY_REVIEWED' && $sppdStatus != 'CLOSED'))?'{view}':'{view}{viewLetterCost}',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/personnel/view", array("id"=>$data->id))',
	            		),
					'viewLetterCost'=>array(
	            		'htmlOptions'=>array('target'=>'blank'),
	            		'url'=>'Yii::app()->createUrl("modsppd/letterCost/view", array("id" => $data->sppd_id, "employee_id"=>$data->employee_id))',
	            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/cost.png',
	            		),
					),
			),
		),
	)); ?>
</div>	