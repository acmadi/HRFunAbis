<?php
/* @var $this DocumentController */
/* @var $model Document */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'document'=>'true'),
	'Document',
	'Create Document',
)));

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Tambah Informasi Dokumen <?php echo Project::model()->getNameByNumber($model->project_number) ?></h1>
	<?php if ($model->task_id) { ?>
	<h4>Task: <?php echo Task::model()->findByPk($model->task_id)->name; ?></h4>
	<?php } ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
