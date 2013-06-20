<?php
$this->breadcrumbs=array(
	'Employee Statuses'=>array('index'),
	$model->status_en,
);

$this->menu=array(
	array('label'=>'Create Status', 'url'=>array('create')),
	array('label'=>'Update Status', 'url'=>array('update', 'id'=>$model->status_en)),
	array('label'=>'Delete Status', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->status_en),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View Status#<?php echo $model->status_en; ?></h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'status_en',
		'status_id',
		'description',
	),
)); ?>
