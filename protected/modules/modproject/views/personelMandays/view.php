<?php
/* @var $this PersonelMandaysController */
/* @var $model PersonelMandays */

$this->breadcrumbs=array(
	'PersonelMandays'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'Update PersonelMandays', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonelMandays', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View PersonelMandays #<?php echo $model->id; ?></h1>
</div>

<?php $this->widget('editable.EditableDetailView', array(
	'data'=>$model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('personelmandays/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'employee_id',
		array(
			'name'=>'month',
			'value'=>PersonelMandays::model()->getMonth($model->month),
			'editable' => array(
				'type' => 'select',
				'source' => PersonelMandays::model()->getPeriodOptions(),
			)
		),
		'mandays',
	),
)); ?>
