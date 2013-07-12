<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'Reimburse Jamuans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Create ReimburseJamuan', 'url'=>array('create')),
	array('label'=>'View ReimburseJamuan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<h1>Update ReimburseJamuan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>