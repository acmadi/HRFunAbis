<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rabdinas-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			array(
	            'header'=>'No',
	            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			// 'employee_id',
			// 'name',
			// 'sppd_id',
			'cost_description',
			array(
				'name'=>'amount',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->amount,\'\'))',
				'htmlOptions' => array('style' => 'text-align:right')
			),
			/*
			'created_date',
			'created_by',
			*/
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>	