<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'Persekot Details'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
	array('label'=>'View PersekotDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<h1>Update PersekotDetail <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>