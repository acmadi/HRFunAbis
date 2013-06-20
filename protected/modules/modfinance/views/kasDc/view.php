<?php
/* @var $this KasDcController */
/* @var $model KasDc */

$this->breadcrumbs=array(
	'Kas Dcs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KasDc', 'url'=>array('index')),
	array('label'=>'Create KasDc', 'url'=>array('create')),
	array('label'=>'Update KasDc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KasDc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KasDc', 'url'=>array('admin')),
);
?>

<h1>View KasDc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code_kas',
		'debit',
		'credit',
		'currency',
		'date',
		'transaction',
		'created_date',
		'created_by',
	),
)); ?>
