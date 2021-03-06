<?php
/* @var $this StatusTrackingController */
/* @var $model StatusTracking */

$this->breadcrumbs=array(
	'Status Trackings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List StatusTracking', 'url'=>array('index')),
	array('label'=>'Create StatusTracking', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('status-tracking-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Status',
	  //   'headerIcon' => 'icon-home',
	  //   'headerButtons' => array(
			// array(
			// 	'class' => 'bootstrap.widgets.TbButtonGroup',
			// 	'buttons'=>array(
			// 		array('label'=>'Tambah Task', 'url'=>array('/modproject/task/create')),
			// 	),
			// ),
	  //   ),
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'status-tracking-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sppd_id',
		'status',
		'status_date',
		'notes',
		'notes_by',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget()?>
