<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Employees'=>array('index'),
	$model->name=>array('view','id'=>$model->employee_id),
	'Update',
)));

$this->menu=array(
	array('label'=>'View Employee', 'url'=>array('view', 'id'=>$model->employee_id)),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update Employee <?php echo $model->employee_id; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>