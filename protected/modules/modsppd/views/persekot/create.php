<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<h1>Create Persekot</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>