<?php
$this->breadcrumbs=array(
	'Service Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ServiceType', 'url'=>array('index')),
	array('label'=>'Create ServiceType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('service-type-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Service Types</h3>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'service-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id', 
			'htmlOptions'=>array('width'=>'5px'),
		),
		'type',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
