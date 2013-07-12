<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Create LetterCost', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('letter-cost-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Surat Biaya Perjalanan Dinas',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Surat Biaya Perjalanan Dinas', 'url'=>array('/modsppd/letterCost/create')),
				),
			),
	    ),
	));		
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'letter-cost-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'airport_tax_cost',
		'airport_tax_quantity',
		'laundry_cost',
		'laundry_quantity',
		'airline_cost',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
