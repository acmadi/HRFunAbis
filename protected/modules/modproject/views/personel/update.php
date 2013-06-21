<?php
/* @var $this PersonelController */
/* @var $model Personel */

$this->breadcrumbs=array(
	'Personels'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Create Personel', 'url'=>array('create')),
	array('label'=>'View Personel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<h1>Update Personel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>