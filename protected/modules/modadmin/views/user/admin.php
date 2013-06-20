<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row-fluid">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Kelola User',
	));		
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name'=>'employee_id',
			'htmlOptions'=>array('width'=>'5px'),
		),
		'username',
		//'password',
		//'salt',
		'email',
		'profile',
		array(
			'name'=>'status',
			'htmlOptions'=>array('width'=>'10px'),
		),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php 
$this->endWidget();
?>

</div>