<?php
/* @var $this ProgressController */
/* @var $model Progress */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->breadcrumbs=array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'progress'=>'true'),
	'Progress',
	'Update Progress',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Create Progress', 'url'=>array('create')),
	array('label'=>'View Progress', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Progress <?php echo $model->period_date; ?></h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>