<?php
/* @var $this SetupUserKasController */
/* @var $model SetupUserKas */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SetupUserKas', 'url'=>array('index')),
	array('label'=>'Create SetupUserKas', 'url'=>array('create')),
	array('label'=>'View SetupUserKas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SetupUserKas', 'url'=>array('admin')),
);
?>

<h1>Update SetupUserKas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>