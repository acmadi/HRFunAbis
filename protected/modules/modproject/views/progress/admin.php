<?php
/* @var $this ProgressController */
/* @var $model Progress */

$this->breadcrumbs=array(
	'Progresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Create Progress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('progress-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Kelola Progress',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Progress', 'url'=>array('/modproject/progress/create')),
				),
			),
	    ),
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'progress-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'project_number',
		'period_date',
		'period_week',
		'period_month',
		'period_year',
		/*
		'progress',
		'description',
		'termin_pgn',
		'termin_vendor',
		'progress_actual',
		'progress_plan',
		'progress_this_week',
		'completed_work',
		'work_remaining',
		'reason_of_delay',
		'pic',
		'created_date',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>