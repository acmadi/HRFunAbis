<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */

$this->breadcrumbs=array(
	'Rekening Dcs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RekeningDc', 'url'=>array('index')),
	array('label'=>'Create RekeningDc', 'url'=>array('create')),
	array('label'=>'Update RekeningDc', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RekeningDc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RekeningDc', 'url'=>array('admin')),
);
?>

<h1>View RekeningDc #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nomor_rek',
		'debit',
		'credit',
		'currency',
		'date',
		'description',
		'created_date',
		'created_by',
	),
)); ?>
