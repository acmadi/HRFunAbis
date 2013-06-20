<?php
$this->breadcrumbs=array(
	'Level Positions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Level', 'url'=>array('index')),
	array('label'=>'Create Level', 'url'=>array('create')),
);

?>

<div class="row-fluid">
<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Data Master : Kelola Level',
	));		
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'level-position-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'position',
		'description',
		'qualification',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget();?>