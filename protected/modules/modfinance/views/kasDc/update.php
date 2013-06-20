<?php
/* @var $this KasDcController */
/* @var $model KasDc */

$this->breadcrumbs=array(
	'Kas Dcs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KasDc', 'url'=>array('index')),
	array('label'=>'Create KasDc', 'url'=>array('create')),
	array('label'=>'View KasDc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KasDc', 'url'=>array('admin')),
);
?>

<h1>Update KasDc <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>