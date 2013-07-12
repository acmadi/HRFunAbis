<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Create Persekot', 'url'=>array('create')),
	array('label'=>'View Persekot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<h1>Update Persekot <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>