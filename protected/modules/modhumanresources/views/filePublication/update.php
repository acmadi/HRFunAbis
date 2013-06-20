<?php
/* @var $this FilePublicationController */
/* @var $model FilePublication */

$this->breadcrumbs=array(
	'File Publications'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FilePublication', 'url'=>array('index')),
	array('label'=>'Create FilePublication', 'url'=>array('create')),
	array('label'=>'View FilePublication', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FilePublication', 'url'=>array('admin')),
);
?>

<h1>Update FilePublication <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>