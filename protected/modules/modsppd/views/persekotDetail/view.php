<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'Persekot Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
	array('label'=>'Update PersekotDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersekotDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<h1>View PersekotDetail #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_code',
		'description',
		'debit',
		'credit',
		'created_date',
		'created_by',
	),
)); ?>
