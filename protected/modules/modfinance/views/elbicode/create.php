<?php
/* @var $this ElbicodeController */
/* @var $model Elbicode */

$this->breadcrumbs=array(
	'Elbicodes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Elbicode', 'url'=>array('index')),
	array('label'=>'Manage Elbicode', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Elbi</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>