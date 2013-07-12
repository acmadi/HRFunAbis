<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Create LetterCost', 'url'=>array('create')),
	array('label'=>'Update LetterCost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LetterCost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<h1>View LetterCost #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'airport_tax_cost',
		'airport_tax_quantity',
		'laundry_cost',
		'laundry_quantity',
		'airline_cost',
		'airline_quantity',
		'hotel_cost',
		'hotel_quantity',
		'transportation_cost',
		'transportation_quantity',
		'from_to_cost',
		'from_to_quantity',
		'lumpsum_cost',
		'lumpsum_quantity',
		'created_date',
		'created_by',
	),
)); ?>
