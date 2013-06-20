<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Employees'=>array('index'),
	'Create',
)));

$this->menu=array(
	//array('label'=>'List Employee', 'url'=>array('index')),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Employee</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>