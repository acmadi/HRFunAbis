<?php
/* @var $this KasExpenseController */
/* @var $model KasExpense */

$this->breadcrumbs=array(
	'Kas Expenses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KasExpense', 'url'=>array('index')),
	array('label'=>'Create KasExpense', 'url'=>array('create')),
	array('label'=>'Update KasExpense', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KasExpense', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KasExpense', 'url'=>array('admin')),
);
?>

<h1>View KasExpense #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'elbi',
		'transaction',
		'amount',
		'created_date',
		'created_by',
	),
)); ?>
