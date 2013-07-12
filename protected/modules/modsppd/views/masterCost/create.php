<?php
/* @var $this MasterCostController */
/* @var $model MasterCost */

$this->breadcrumbs=array(
	'Master Costs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterCost', 'url'=>array('index')),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<h1>Create MasterCost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>