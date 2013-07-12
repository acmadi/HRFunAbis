<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'Persekot Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('persekot-detail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Detail Persekot',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Detail Persekot', 'url'=>array('/modsppd/persekotDetail/create')),
				),
			),
	    ),
	));		
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'persekot-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'account_code',
		'description',
		'debit',
		'credit',
		'created_date',
		/*
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
