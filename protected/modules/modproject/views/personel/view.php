<?php
/* @var $this PersonelController */
/* @var $model Personel */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Personel',
	$model->name,
)));

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Create Personel', 'url'=>array('create')),
	array('label'=>'Update Personel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Personel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View Personnel <?php echo $model->name; ?></h1>
</div>

<?php $this->widget('editable.EditableDetailView', array(
	'data'=>$model,
	'url' => $this->createUrl('personel/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'project_number',
		'employee_id',
		'name',
		'position',
		'position_task',
		'start_join',
		'end_join',
		'telepon',
		'email',
		'remarks',
		'created_by',
		'created_date',
	),
)); ?>
