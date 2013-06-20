<?php
$this->breadcrumbs=array(
	'Job Experiences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PositionExp', 'url'=>array('index')),
	array('label'=>'Create PositionExp', 'url'=>array('create')),
	array('label'=>'Update PositionExp', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PositionExp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PositionExp', 'url'=>array('admin')),
);
?>

<h1>View PositionExp #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'period_start',
		'period_finish',
		'position',
		'job_description',
	),
)); ?>
