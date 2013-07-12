<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'Reimburse Jamuans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Create ReimburseJamuan', 'url'=>array('create')),
	array('label'=>'Update ReimburseJamuan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReimburseJamuan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<h1>View ReimburseJamuan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'transaction_description',
		'amount',
		'cc',
		'usage_type',
		'created_date',
		'created_by',
	),
)); ?>
