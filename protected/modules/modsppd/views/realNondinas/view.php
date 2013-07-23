<?php
/* @var $this RealNondinasController */
/* @var $model RealNondinas */

$this->breadcrumbs=array(
	'Real Nondinases'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List RealNondinas', 'url'=>array('index')),
	array('label'=>'Create RealNondinas', 'url'=>array('create')),
	array('label'=>'Update RealNondinas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RealNondinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RealNondinas', 'url'=>array('admin')),
);
?>

<h1>View RealNondinas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sppd_id',
		'name',
		'amount',
		'explanation',
		'created_by',
		'created_date',
	),
)); ?>
