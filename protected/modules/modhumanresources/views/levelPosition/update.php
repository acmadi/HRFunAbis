<?php
$this->breadcrumbs=array(
	'Level Positions'=>array('index'),
	$model->position=>array('view','id'=>$model->position),
	'Update',
);

$this->menu=array(
	array('label'=>'List LevelPosition', 'url'=>array('index')),
	array('label'=>'Create LevelPosition', 'url'=>array('create')),
	array('label'=>'View LevelPosition', 'url'=>array('view', 'id'=>$model->position)),
	array('label'=>'Manage LevelPosition', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update Level Position <?php echo $model->position; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>