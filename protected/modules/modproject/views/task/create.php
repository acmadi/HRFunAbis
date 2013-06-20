<?php
/* @var $this TaskController */
/* @var $model Task */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Tasks'=>array('index'),
	'Create',
)));

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Create Task</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>