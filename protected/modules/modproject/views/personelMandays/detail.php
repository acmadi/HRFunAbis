<?php

$this->breadcrumbs=array(
	'PersonelMandays'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Procurement', 'url'=>array('index')),
	array('label'=>'Create Procurement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('procurement-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Kelola Hari Kerja Personil',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Hari Kerja', 'url'=>array('/modproject/personelmandays/create','employee_id'=>$_GET['employee_id'])),
				),
			),
	    ),
	));		
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'procurement-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
 		'employee_id',
 		'project_number',
 		'month',
 		'mandays',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>