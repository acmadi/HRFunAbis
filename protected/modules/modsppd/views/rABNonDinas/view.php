<?php
/* @var $this RABNonDinasController */
/* @var $model RABNonDinas */

$this->breadcrumbs=array(
	'Rabnon Dinases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RABNonDinas', 'url'=>array('index')),
	array('label'=>'Create RABNonDinas', 'url'=>array('create')),
	array('label'=>'Update RABNonDinas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RABNonDinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'RAB Non-Dinas #',
	));		
?>
<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('form/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'explanation',
		'amount',
		'additional_description',
		'created_date',
		'created_by',
	),
)); ?>

<?php $this->endWidget(); ?>