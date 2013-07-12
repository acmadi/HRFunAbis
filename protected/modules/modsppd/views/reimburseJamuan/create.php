<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'Reimburse Jamuans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<h1>Create ReimburseJamuan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>