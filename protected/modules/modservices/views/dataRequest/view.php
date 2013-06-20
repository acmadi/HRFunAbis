<?php
$this->breadcrumbs=array(
	'Data Requests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DataRequest', 'url'=>array('index')),
	array('label'=>'Create DataRequest', 'url'=>array('create')),
	array('label'=>'Update DataRequest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DataRequest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DataRequest', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'View DataRequest #');?><?php echo $model->id; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'request_type',
		'request_date',
		'request_by',
		'request_phone_email',
		'request_division',
		'request_issue',
		'request_description',
		'request_solved_by',
		'request_answer',
		'request_attachment',
		'request_close_date',
		'created_by',
		'created_date',
	),
)); ?>
