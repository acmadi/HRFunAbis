<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'Persekot Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<h1>Create PersekotDetail</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>