<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'Persekot Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
	array('label'=>'Update PersekotDetail', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersekotDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Detail Persekot #',
	));		
?>
<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('persekotDetail/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'account_code',
		'description',
		'debit',
		'credit',
		'created_date',
		'created_by',
	),
)); ?>

<?php $this->endWidget(); ?>