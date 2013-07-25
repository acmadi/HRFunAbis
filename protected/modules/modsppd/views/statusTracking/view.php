<?php
/* @var $this StatusTrackingController */
/* @var $model StatusTracking */

$this->breadcrumbs=array(
	'Status Trackings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusTracking', 'url'=>array('index')),
	array('label'=>'Create StatusTracking', 'url'=>array('create')),
	array('label'=>'Update StatusTracking', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StatusTracking', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusTracking', 'url'=>array('admin')),
);
?>

<h1>View StatusTracking #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sppd_id',
		'status',
		'status_date',
		'notes',
		'notes_by',
	),
)); ?>
