<?php
/* @var $this MasterDestinationController */
/* @var $model MasterDestination */

$this->breadcrumbs=array(
	'Master Destinations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterDestination', 'url'=>array('index')),
	array('label'=>'Create MasterDestination', 'url'=>array('create')),
	array('label'=>'View MasterDestination', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterDestination', 'url'=>array('admin')),
);
?>

<h1>Update MasterDestination <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>