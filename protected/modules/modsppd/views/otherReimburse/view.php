<?php
/* @var $this OtherReimburseController */
/* @var $model OtherReimburse */

$this->breadcrumbs=array(
	'Other Reimburses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OtherReimburse', 'url'=>array('index')),
	array('label'=>'Create OtherReimburse', 'url'=>array('create')),
	array('label'=>'Update OtherReimburse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OtherReimburse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OtherReimburse', 'url'=>array('admin')),
);
?>

<h1>View OtherReimburse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'cc',
		'elbi',
		'amount',
		'created_date',
		'created_by',
	),
)); ?>
