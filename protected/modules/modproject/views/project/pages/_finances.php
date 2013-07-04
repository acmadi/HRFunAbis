<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Finansial',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'finance-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		array(
            'header'=>'No',
            'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',       //  row is zero based
        ),
		// 'id',
		// 'project_number',
		'elbi',
		'elbi_desc',
		'period_month',
		array(
			'name'=>'debit',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->debit,\'\'))',
			'footer' => CHtml::encode(Yii::app()->numberFormatter->formatCurrency(Finance::model()->getTotalDebit(),'')),
			),
		array(
			'name'=>'credit',
			'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->credit,\'\'))',
			'footer' => CHtml::encode(Yii::app()->numberFormatter->formatCurrency(Finance::model()->getTotalCredit(),'')),
			),
		'remarks',
		// 'created_by',
		// 'created_date',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=> array(
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/finance/view", array("id"=>$data->id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/finance/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/finance/delete", array("id"=>$data->id))',
            		),
            	),
			),
	),
)); ?>


<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/finance/create'))
	),
)); ?>
</div>