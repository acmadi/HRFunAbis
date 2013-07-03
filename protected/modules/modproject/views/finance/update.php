<?php
/* @var $this FinanceController */
/* @var $model Finance */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Finance',
	'Update Finance',
)));

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Create Finance', 'url'=>array('create')),
	array('label'=>'View Finance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update Finance <?php echo $model->id; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>