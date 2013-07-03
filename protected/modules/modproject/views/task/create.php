<?php
/* @var $this TaskController */
/* @var $model Task */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Task',
	'Create Task',
)));

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Tambah Informasi Task: ".$model->project_number,
	));
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
	$this->endWidget();
?>