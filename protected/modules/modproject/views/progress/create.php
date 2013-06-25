<?php
/* @var $this ProgressController */
/* @var $model Progress */

$this->breadcrumbs=array(
	'Progresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Tambah Informasi Progress : ".$model->project_number,
	));
	
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
	$this->endWidget();
?>