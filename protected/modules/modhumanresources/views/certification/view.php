<?php
$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Certification', 'url'=>array('index')),
	array('label'=>'Create Certification', 'url'=>array('create')),
	array('label'=>'Update Certification', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Certification', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Certification', 'url'=>array('admin')),
);
?>

<h1>View Certification #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'type',
		'certification_name',
		'year_certification',
		'year_expired',
	),
)); ?>
