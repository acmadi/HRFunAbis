<?php
/* @var $this KasSaldoController */
/* @var $model KasSaldo */

$this->breadcrumbs=array(
	'Kas Saldos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KasSaldo', 'url'=>array('index')),
	array('label'=>'Manage KasSaldo', 'url'=>array('admin')),
);
?>

<h1>Create KasSaldo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>