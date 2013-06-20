<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	$model->department=>array('view','id'=>$model->department),
	'Update',
);

$this->menu=array(
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update Department <?php echo $model->position; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>