<?php
$this->breadcrumbs=array(
	'Dependents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Dependent', 'url'=>array('index')),
	array('label'=>'Create Dependent', 'url'=>array('create')),
	array('label'=>'Update Dependent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dependent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dependent', 'url'=>array('admin')),
);
?>

<h1>View Dependent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'name',
		'relationship',
		'gender',
		'date_of_birth',
	),
)); ?>
