<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Forms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('form-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar SPPD',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah SPPD', 'url'=>array('/modsppd/form/create')),
				),
			),
	    ),
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'form-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'name',
		'service_provider',
		'unit',
		'class',
		'destination',
		'purpose',
		'departure',
		'arrival',
		// 'transport_type',
		// 'transport_vehicle',
		'sppd_type',
		// 'statement_letter',
		// 'support_letter',
		// 'created_by',
		// 'created_date',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
