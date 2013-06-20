<?php
$this->breadcrumbs=array(
	'Level Positions'=>array('index'),
	$model->position,
);

$this->menu=array(
	array('label'=>'Create Level', 'url'=>array('create')),
	array('label'=>'Update Level', 'url'=>array('update', 'id'=>$model->position)),
	array('label'=>'Delete Level', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->position),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Level', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>View LevelPosition #<?php echo $model->position; ?></h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'position',
		'description',
		'qualification',
	),
)); ?>
