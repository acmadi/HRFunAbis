<?php
$this->breadcrumbs=array(
	'Data Requests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DataRequest', 'url'=>array('index')),
	array('label'=>'Create DataRequest', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('data-request-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Manage Data Requests</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'data-request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id', 
			'htmlOptions'=>array('width'=>'5px'),
		),
		'request_type',
		'request_date',
		'request_by',
		'request_phone_email',
		'request_division',
		/*
		'request_issue',
		'request_description',
		'request_solved_by',
		'request_answer',
		'request_attachment',
		'request_close_date',
		'created_by',
		'created_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
