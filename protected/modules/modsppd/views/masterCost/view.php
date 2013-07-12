<?php
/* @var $this MasterCostController */
/* @var $model MasterCost */

$this->breadcrumbs=array(
	'Master Costs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCost', 'url'=>array('index')),
	array('label'=>'Create MasterCost', 'url'=>array('create')),
	array('label'=>'Update MasterCost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<h1>View MasterCost #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'class',
		'amount',
		'description',
	),
)); ?>
