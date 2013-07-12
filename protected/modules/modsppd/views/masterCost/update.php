<?php
/* @var $this MasterCostController */
/* @var $model MasterCost */

$this->breadcrumbs=array(
	'Master Costs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterCost', 'url'=>array('index')),
	array('label'=>'Create MasterCost', 'url'=>array('create')),
	array('label'=>'View MasterCost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<h1>Update MasterCost <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>