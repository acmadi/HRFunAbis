<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Pengadaan',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'procurement-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
        ),
		// 'id',
		// 'project_number',
		'vendor',
		'contract',
		'contract_start_date',
		'contract_end_date',
		'period_month',
		'item',
		array(
			'name'=>'unit_price',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->unit_price,\'\'))',
			),
		'amount',
		'total_price',
		array(
			'name'=>'total_price',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->total_price,\'\'))',
			'footer' => CHtml::encode(Yii::app()->numberFormatter->formatCurrency(Procurement::model()->getSumTotalPrice(),'')),
			),
		'location',
		// 'created_by',
		// 'created_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
            'buttons'=> array(
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/procurement/view", array("id"=>$data->id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/procurement/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/procurement/delete", array("id"=>$data->id))',
            		),
	        	),
            'htmlOptions'=>array(
            	'width' => '50px'
            	),
		),
	),
)); ?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/procurement/create'))
	),
)); ?>
</div>