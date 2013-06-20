<?php
$this->breadcrumbs=array(
	'Employee Statuses'=>array('index'),
	$model->status_en=>array('view','id'=>$model->status_en),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update Status <?php echo $model->position; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>