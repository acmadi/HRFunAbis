<?php
/* @var $this ProcurementController */
/* @var $model Procurement */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Procurement',
	'Update Procurement',
)));

$this->menu=array(
	array('label'=>'List Procurement', 'url'=>array('index')),
	array('label'=>'Create Procurement', 'url'=>array('create')),
	array('label'=>'View Procurement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Procurement', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Pengadaan <?php echo $model->id; ?></h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>