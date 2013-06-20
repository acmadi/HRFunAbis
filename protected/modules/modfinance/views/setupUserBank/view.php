<?php
/* @var $this SetupUserBankController */
/* @var $model SetupUserBank */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SetupUserBank', 'url'=>array('index')),
	array('label'=>'Create SetupUserBank', 'url'=>array('create')),
	array('label'=>'Update SetupUserBank', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SetupUserBank', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SetupUserBank', 'url'=>array('admin')),
);
?>

<h1>View SetupUserBank #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'nomor_rek',
		'active_since',
		'status',
	),
)); ?>
