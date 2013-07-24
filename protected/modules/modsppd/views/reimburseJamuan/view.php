<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Detail Reimburse Jamuan',
	$model->transaction_description,
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Create ReimburseJamuan', 'url'=>array('create')),
	array('label'=>'Update ReimburseJamuan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReimburseJamuan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Reimburse Jamuan #',
	));		
?>

<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('reimburseJamuan/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'date',
		'transaction_description',
		'amount',
		'cc',
		'usage_type',
		'created_date',
		'created_by',
	),
)); ?>

<?php $this->endWidget(); ?>