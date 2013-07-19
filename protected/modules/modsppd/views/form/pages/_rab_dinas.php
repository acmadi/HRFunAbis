<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rabdinas-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			array(
	            'header'=>'No',
	            'value'=>'$row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			// 'employee_id',
			'name',
			// 'sppd_id',
			array(
				'name'=>'cost_description',
				'footer' => 'Total',
				'footerHtmlOptions' => array('style'=>'font-weight:bold'),
				),
			'days',
			array(
				'name'=>'amount',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->amount,\'\'))',
				'footer' => Yii::app()->numberFormatter->formatCurrency(RABDinas::model()->getTotal($sppd_id),''),
				'htmlOptions' => array('style' => 'text-align:right'),
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold')
				),
			/*
			'created_date',
			'created_by',
			*/
			array(
				'class'=>'CButtonColumn',
				'buttons' => array(
					'view'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABDinas/view", array("id"=>$data->id))',
	            		),
	            	'update'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABDinas/update", array("id"=>$data->id))',
	            		),
	            	'delete'=>array(
	            		'url'=>'Yii::app()->createUrl("modsppd/rABDinas/delete", array("id"=>$data->id))',
	            		),
					),
			),
		),
	)); ?>
</div>	