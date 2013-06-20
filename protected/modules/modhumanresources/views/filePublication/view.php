<?php
/* @var $this FilePublicationController */
/* @var $model FilePublication */

$this->breadcrumbs=array(
	'File Publications'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FilePublication', 'url'=>array('index')),
	array('label'=>'Create FilePublication', 'url'=>array('create')),
	array('label'=>'Update FilePublication', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FilePublication', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FilePublication', 'url'=>array('admin')),
);
?>

<h1>View FilePublication #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'version',
		'version_date',
		'file_upload',
		'craeted_by',
		'created_date',
	),
)); ?>
