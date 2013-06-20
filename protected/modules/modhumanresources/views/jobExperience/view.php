<?php
$this->breadcrumbs=array(
	'Job Experiences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JobExperience', 'url'=>array('index')),
	array('label'=>'Create JobExperience', 'url'=>array('create')),
	array('label'=>'Update JobExperience', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JobExperience', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JobExperience', 'url'=>array('admin')),
);
?>

<h1>View JobExperience #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'period_start',
		'period_finish',
		'company',
		'position',
		'job_description',
	),
)); ?>
