<div class="span12">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'rabnon-dinas-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			array(
	            'header'=>'No',
	            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
	            'htmlOptions' => array('style' => 'width:10px')
	        ),
			// 'id',
			'explanation',
			array(
				'name'=>'amount',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->amount,\'\'))',
				'htmlOptions' => array('style' => 'text-align:right')
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