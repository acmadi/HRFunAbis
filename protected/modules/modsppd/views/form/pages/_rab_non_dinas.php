<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rabnon-dinas-grid',
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
			array(
				'name'=>'explanation',
				'footer' => 'Total',
				'footerHtmlOptions' => array('style'=>'font-weight:bold'),
				),
			'days',
			array(
				'name'=>'amount',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->amount,\'\'))',
				'footer' => Yii::app()->numberFormatter->formatCurrency(RABNonDinas::model()->getTotal($sppd_id),''),
				'htmlOptions' => array('style' => 'text-align:right'),
				'footerHtmlOptions' => array('style' => 'text-align:right; font-weight:bold')
			),
			'additional_description',
			// 'created_date',
			// 'created_by',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>	