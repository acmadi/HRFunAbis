<?php
/* @var $this HierarchyController */
/* @var $model Hierarchy */

$this->breadcrumbs=array(
	'Hierarchies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hierarchy', 'url'=>array('index')),
	array('label'=>'Create Hierarchy', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('hierarchy-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar Hierarki',
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
	'id'=>'hierarchy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'manager_id',
		'manager_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget()?>