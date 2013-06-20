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

<h1>View Progress #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_number',
		'period_date',
		'period_week',
		'period_month',
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
)); ?>
