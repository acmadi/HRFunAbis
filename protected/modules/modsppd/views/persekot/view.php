<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Create Persekot', 'url'=>array('create')),
	array('label'=>'Update Persekot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Persekot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<h1>View Persekot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sppd_id',
		'paid_to',
		'received_from',
		'amount',
		'amount_in_words',
		'check_giro_date',
		'check_giro_number',
		'currency_code',
		'bank_code',
		'journal_number',
		'voucher_number',
		'voucher_date',
		'created_by',
		'created_date',
	),
)); ?>
