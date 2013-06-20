<?php
$this->breadcrumbs=array(
	'Emergency Records'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EmergencyRecord', 'url'=>array('index')),
	array('label'=>'Create EmergencyRecord', 'url'=>array('create')),
	array('label'=>'Update EmergencyRecord', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmergencyRecord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmergencyRecord', 'url'=>array('admin')),
);
?>

<h1>View EmergencyRecord #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'name',
		'relationship',
		'contact',
		'address',
		'phone',
	),
)); ?>
