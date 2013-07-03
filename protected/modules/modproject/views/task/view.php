<?php
/* @var $this TaskController */
/* @var $model Task */
$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->breadcrumbs=array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Task',
	$model->name,
);

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Update Task', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Task', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Task <?php echo $model->name; ?></h1>
</div>

<?php
	 $this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('task/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'project_number',
		'code',
		'name',
		'description',
		'plan_start_date',
		'plan_end_date',
		'plan_progress',
		'act_start_date',
		'act_end_date',
		'actual_progress',
		'remarks',
		'created_date',
		'created_by',
		)
	));
?>
