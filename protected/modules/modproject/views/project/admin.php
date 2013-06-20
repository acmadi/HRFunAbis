<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects'=>array('index'), 
	'Manage',
)));

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Proyek',
	    'headerIcon' => 'icon-home',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Proyek', 'url'=>array('/modproject/project/create')),
				),
			),
	    ),
	));		
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'number',
		'name',
		'owner',
		'description',
		'version',
		/*
		'version_date',
		'status',
		'status_date',
		'location',
		'plan_start_date',
		'plan_end_date',
		'act_start_date',
		'act_end_date',
		'duration',
		'spmk_date',
		'amount',
		'pic',
		'created_by',
		'created_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php 
	$this->endWidget();
	?>
