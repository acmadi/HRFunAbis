<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>"Tambah Informasi Finance : ".$model->project_number,
	));
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
	$this->endWidget();
?>