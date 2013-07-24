<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Detail RAB Dinas',
	$model->name,
	$model->cost_description,
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Create RABDinas', 'url'=>array('create')),
	array('label'=>'Update RABDinas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RABDinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'RAB Dinas #',
	));		
?>
<?php 
	$this->widget('editable.EditableDetailView', array(
	'data' => $model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('rABDinas/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'employee_id',
		'name',
		'sppd_id',
		'cost_description',
		'amount',
		'created_date',
		'created_by',
	),
)); ?>

<?php $this->endWidget(); ?>