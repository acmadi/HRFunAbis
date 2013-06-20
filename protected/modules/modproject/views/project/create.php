<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects'=>array('create'),
	'Create',
)));

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Create Project</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>