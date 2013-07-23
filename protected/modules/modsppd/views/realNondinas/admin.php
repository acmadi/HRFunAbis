<?php
/* @var $this RealNondinasController */
/* @var $model RealNondinas */

$this->breadcrumbs=array(
	'Real Nondinases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RealNondinas', 'url'=>array('index')),
	array('label'=>'Create RealNondinas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('real-nondinas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Realisasi Non Dinas',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Realisasi Non Dinas', 'url'=>array('/modsppd/realNondinas/create')),
				),
			),
	    ),
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'real-nondinas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sppd_id',
		'name',
		'amount',
		'explanation',
		'created_by',
		/*
		'created_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
