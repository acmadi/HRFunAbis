<?php
/* @var $this KasSaldoController */
/* @var $model KasSaldo */

$this->breadcrumbs=array(
	'Kas Saldos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KasSaldo', 'url'=>array('index')),
	array('label'=>'Create KasSaldo', 'url'=>array('create')),
	array('label'=>'View KasSaldo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KasSaldo', 'url'=>array('admin')),
);
?>

<h1>Update KasSaldo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>