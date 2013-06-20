<?php
$this->breadcrumbs=array(
	'Employee Statuses'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List EmployeeStatus', 'url'=>array('index')),
	array('label'=>'Create EmployeeStatus', 'url'=>array('create')),
);
?>

<div class="row-fluid">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Data Master : Kelola Employee Status',
	));		
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-status-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'status_en',
		'status_id',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php $this->endWidget();?>