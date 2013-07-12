<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Create Persekot', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('persekot-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Persekot',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Persekot', 'url'=>array('/modsppd/persekot/create')),
				),
			),
	    ),
	));		
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'persekot-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sppd_id',
		'paid_to',
		'received_from',
		'amount',
		'amount_in_words',
		/*
		'check_giro_date',
		'check_giro_number',
		'currency_code',
		'bank_code',
		'journal_number',
		'voucher_number',
		'voucher_date',
		'created_by',
		'created_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
