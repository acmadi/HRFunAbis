<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Document', 'url'=>array('index')),
	array('label'=>'Manage Document', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Tambah Informasi Dokumen : ".$model->project_number,
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
	$this->endWidget();
?>