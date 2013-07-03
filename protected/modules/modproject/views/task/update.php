<?php
/* @var $this TaskController */
/* @var $model Task */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Task',
	'Update Task',
)));
$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'View Task', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Task <?php echo $model->name; ?></h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>