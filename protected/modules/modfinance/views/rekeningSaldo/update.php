<?php
/* @var $this RekeningSaldoController */
/* @var $model RekeningSaldo */

$this->breadcrumbs=array(
	'Rekening Saldos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekeningSaldo', 'url'=>array('index')),
	array('label'=>'Create RekeningSaldo', 'url'=>array('create')),
	array('label'=>'View RekeningSaldo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RekeningSaldo', 'url'=>array('admin')),
);
?>

<h1>Update RekeningSaldo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>