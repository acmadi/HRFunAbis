<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Department</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<div class="row-fluid">
  	<div class="span12">
    
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>	