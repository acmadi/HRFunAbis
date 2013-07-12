<?php
/* @var $this MasterDestinationController */
/* @var $model MasterDestination */

$this->breadcrumbs=array(
	'Master Destinations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterDestination', 'url'=>array('index')),
	array('label'=>'Manage MasterDestination', 'url'=>array('admin')),
);
?>

<h1>Create MasterDestination</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>