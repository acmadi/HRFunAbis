<?php
/* @var $this KasSaldoController */
/* @var $model KasSaldo */

$this->breadcrumbs=array(
	'Kas Saldos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List KasSaldo', 'url'=>array('index')),
	array('label'=>'Create KasSaldo', 'url'=>array('create')),
	array('label'=>'Update KasSaldo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KasSaldo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KasSaldo', 'url'=>array('admin')),
);
?>

<h1>View KasSaldo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code_kas',
		'akumulasi_saldo',
		'transaksi',
		'description',
		'date',
		'created_by',
		'created_date',
	),
)); ?>
