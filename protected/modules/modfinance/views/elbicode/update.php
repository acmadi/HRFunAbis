<?php
/* @var $this ElbicodeController */
/* @var $model Elbicode */

$this->breadcrumbs=array(
	'Elbicodes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Elbicode', 'url'=>array('index')),
	array('label'=>'Create Elbicode', 'url'=>array('create')),
	array('label'=>'View Elbicode', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Elbicode', 'url'=>array('admin')),
);
?>

<h1>Update Elbicode <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>