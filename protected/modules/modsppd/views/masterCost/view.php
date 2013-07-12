<?php
/* @var $this MasterCostController */
/* @var $model MasterCost */

$this->breadcrumbs=array(
	'Master Costs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCost', 'url'=>array('index')),
	array('label'=>'Create MasterCost', 'url'=>array('create')),
	array('label'=>'Update MasterCost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Master Biaya #',
	));		
?>

<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('masterCost/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'class',
		'amount',
		'description',
	),
)); ?>

<?php $this->endWidget(); ?>
