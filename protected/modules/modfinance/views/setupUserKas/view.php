<?php
/* @var $this SetupUserKasController */
/* @var $model SetupUserKas */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SetupUserKas', 'url'=>array('index')),
	array('label'=>'Create SetupUserKas', 'url'=>array('create')),
	array('label'=>'Update SetupUserKas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SetupUserKas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SetupUserKas', 'url'=>array('admin')),
);
?>

<h1>View SetupUserKas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'code_kas',
		'active_since',
		'status',
	),
)); ?>
