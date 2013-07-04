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

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Informasi Dokumen '.Project::model()->getNameByNumber($model->project_number).''.
		(($model->task_id)?'<br/>Task: '.Task::model()->findByPk($model->task_id)->name:''),
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	$this->endWidget();
?>
