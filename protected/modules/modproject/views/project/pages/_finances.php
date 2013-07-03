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
		// 'id',
		// 'project_number',
		'elbi',
		'elbi_desc',
		'period_month',
		array(
			'name'=>'debit',
			'footer' => CHtml::encode(Yii::app()->numberFormatter->formatCurrency(Finance::model()->getTotalDebit(),'')),
			),
		array(
			'name'=>'credit',
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