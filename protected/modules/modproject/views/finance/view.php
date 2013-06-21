<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Create Finance', 'url'=>array('create')),
	array('label'=>'Update Finance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Finance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View Finance #<?php echo $model->id; ?></h1>
</div>

<?php $this->widget('editable.EditableDetailView', array(
	'data'=>$model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('finance/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'project_number',
		'elbi',
		'elbi_desc',
		array(
			'name'=>'period_month',
			'value'=>Finance::model()->getMonth($model->period_month),
			'editable' => array(
				'type' => 'select',
				'source' => Finance::model()->getPeriodOptions(),
			)
		),
		'debit',
		'credit',
		'remarks',
		'created_by',
		'created_date',
	),
)); ?>
