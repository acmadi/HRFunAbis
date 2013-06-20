<?php
$this->breadcrumbs=array(
	'Departments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Department', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('department-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Data Master : Kelola Department',
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'department-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'department',
		'branch_office',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>