<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
'title' => 'Info Progress',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class'=>'bootstrap-widget-table')
));?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'progress-grid',
	'dataProvider'=>$data->search(),
	'filter'=>$data,
	'columns'=>array(
		// 'id',
		// 'project_number',
		// 'period_date',
		'period_week',
		'period_month',
		// 'period_year',
		// 'description',
		// 'termin_pgn',
		// 'termin_vendor',
		'progress_actual',
		'progress_plan',
		'progress_this_week',
		// 'completed_work',
		'work_remaining',
		'reason_of_delay',
		'pic',
		// 'created_date',
		// 'created_by',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=> array(
            	'view'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/view", array("id"=>$data->id))',
            		),
            	'update'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/update", array("id"=>$data->id))',
            		),
            	'delete'=>array(
            		'url'=>'Yii::app()->createUrl("modproject/progress/delete", array("id"=>$data->id))',
            		),
	        	),
            'htmlOptions'=>array(
            	'width' => '80px',
            	),
	        ),
		),
)); ?>

<?php $this->endWidget();?>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'buttons'=>array(
		array('label'=>'Create', 'url'=>array('/modproject/progress/create'))
	),
)); ?>
</div>