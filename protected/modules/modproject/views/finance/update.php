<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Create Finance', 'url'=>array('create')),
	array('label'=>'View Finance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>

<h1>Update Finance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>