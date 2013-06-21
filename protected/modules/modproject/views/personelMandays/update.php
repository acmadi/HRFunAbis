<?php
/* @var $this PersonelMandaysController */
/* @var $model PersonelMandays */

$this->breadcrumbs=array(
	'Personel Mandays'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'View PersonelMandays', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<h1>Update PersonelMandays <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>