<?php
/* @var $this TaskController */
/* @var $model Task */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Tasks'=>array('index'),
	'Manage',
)));

$this->menu=array(
	array('label'=>'List Task', 'url'=>array('index')),
	array('label'=>'Create Task', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('task-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Task',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Task', 'url'=>array('/modproject/task/create')),
				),
			),
	    ),
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'task-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'project_number',
		'code',
		'name',
		'description',
		'plan_start_date',
		/*
		'plan_end_date',
		'plan_progress',
		'act_start_date',
		'act_end_date',
		'actual_progress',
		'remarks',
		'created_date',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>