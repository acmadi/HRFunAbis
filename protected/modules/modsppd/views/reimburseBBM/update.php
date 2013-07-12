<?php
/* @var $this ReimburseBBMController */
/* @var $model ReimburseBBM */

$this->breadcrumbs=array(
	'Reimburse Bbms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReimburseBBM', 'url'=>array('index')),
	array('label'=>'Create ReimburseBBM', 'url'=>array('create')),
	array('label'=>'View ReimburseBBM', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReimburseBBM', 'url'=>array('admin')),
);
?>

<h1>Update ReimburseBBM <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>