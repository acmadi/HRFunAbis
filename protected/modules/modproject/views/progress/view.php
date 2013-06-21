<?php
/* @var $this ProgressController */
/* @var $model Progress */

$this->breadcrumbs=array(
	'Progresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Create Progress', 'url'=>array('create')),
	array('label'=>'Update Progress', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Progress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Progress #<?php echo $model->id; ?></h1>
</div>

<?php
	 $this->widget('editable.EditableDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'project_number',
			'period_date',
			'period_week',
			array(
					'name'=>'period_month',
					'editable' => array(
						'type' => 'select',
						'source' => Progress::model()->getPeriodMonths(),
					)
				),
			'period_year',
			'progress',
			'description',
			'termin_pgn',
			'termin_vendor',
			'progress_actual',
			'progress_plan',
			'progress_this_week',
			'completed_work',
			'work_remaining',
			'reason_of_delay',
			'pic',
			'created_date',
			'created_by',
		),
	));
?>