<?php
/* @var $this ReimburseBBMController */
/* @var $model ReimburseBBM */

$this->breadcrumbs=array(
	'Reimburse Bbms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReimburseBBM', 'url'=>array('index')),
	array('label'=>'Create ReimburseBBM', 'url'=>array('create')),
	array('label'=>'Update ReimburseBBM', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReimburseBBM', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReimburseBBM', 'url'=>array('admin')),
);
?>

<h1>View ReimburseBBM #<?php echo $model->id; ?></h1>

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
