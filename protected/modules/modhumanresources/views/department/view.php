<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->department,
);

$this->menu=array(
	array('label'=>'Create Department', 'url'=>array('create')),
	array('label'=>'Update Department', 'url'=>array('update', 'id'=>$model->department)),
	array('label'=>'Delete Department', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->department),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View Department #<?php echo $model->department; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'department',
		'branch_office',
		'description',
	),
)); ?>
