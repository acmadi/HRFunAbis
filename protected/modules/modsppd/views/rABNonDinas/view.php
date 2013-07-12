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

<h1>View RABNonDinas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'explanation',
		'amount',
		'additional_description',
		'created_date',
		'created_by',
	),
)); ?>
