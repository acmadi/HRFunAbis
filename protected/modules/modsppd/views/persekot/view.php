<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Create Persekot', 'url'=>array('create')),
	array('label'=>'Update Persekot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Persekot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Persekot #',
	));		
?>

<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('persekot/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'sppd_id',
		'paid_to',
		'received_from',
		'amount',
		'amount_in_words',
		'check_giro_date',
		'check_giro_number',
		'currency_code',
		'bank_code',
		'journal_number',
		'voucher_number',
		'voucher_date',
		'created_by',
		'created_date',
	),
)); ?>

<?php $this->endWidget(); ?>