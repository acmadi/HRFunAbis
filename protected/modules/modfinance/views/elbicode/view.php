<?php
/* @var $this ElbicodeController */
/* @var $model Elbicode */

$this->breadcrumbs=array(
	'Elbicodes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Elbicode', 'url'=>array('index')),
	array('label'=>'Create Elbicode', 'url'=>array('create')),
	array('label'=>'Update Elbicode', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Elbicode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Elbicode', 'url'=>array('admin')),
);
?>

<h1>View Elbicode #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'elbi',
		'elbi_desc',
	),
)); ?>
