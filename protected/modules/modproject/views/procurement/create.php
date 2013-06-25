<?php
/* @var $this ProcurementController */
/* @var $model Procurement */

$this->breadcrumbs=array(
	'Procurements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Procurement', 'url'=>array('index')),
	array('label'=>'Manage Procurement', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Tambah Informasi Pengadaan: ".$model->project_number,
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
	$this->endWidget();
?>