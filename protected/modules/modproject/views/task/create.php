<?php
/* @var $this TaskController */
/* @var $model Task */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Tasks'=>array('index'),
	'Create',
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