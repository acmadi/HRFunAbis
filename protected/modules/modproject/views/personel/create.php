<?php
/* @var $this PersonelController */
/* @var $model Personel */

$this->breadcrumbs=array(
	'Personels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
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