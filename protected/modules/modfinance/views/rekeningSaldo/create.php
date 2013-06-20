<?php
/* @var $this RekeningSaldoController */
/* @var $model RekeningSaldo */

$this->breadcrumbs=array(
	'Rekening Saldos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RekeningSaldo', 'url'=>array('index')),
	array('label'=>'Manage RekeningSaldo', 'url'=>array('admin')),
);
?>

<h1>Create RekeningSaldo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>