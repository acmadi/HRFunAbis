<?php
/* @var $this RekeningSaldoController */
/* @var $model RekeningSaldo */

$this->breadcrumbs=array(
	'Rekening Saldos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RekeningSaldo', 'url'=>array('index')),
	array('label'=>'Create RekeningSaldo', 'url'=>array('create')),
	array('label'=>'Update RekeningSaldo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RekeningSaldo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RekeningSaldo', 'url'=>array('admin')),
);
?>

<h1>View RekeningSaldo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nomor_rek',
		'akumulasi_saldo',
		'transaksi',
		'description',
		'date',
		'created_by',
		'created_date',
	),
)); ?>
