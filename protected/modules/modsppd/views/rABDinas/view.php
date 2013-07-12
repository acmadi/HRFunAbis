<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'Rabdinases'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Create RABDinas', 'url'=>array('create')),
	array('label'=>'Update RABDinas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RABDinas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<h1>View RABDinas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
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
