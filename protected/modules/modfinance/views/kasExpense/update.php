<?php
/* @var $this KasExpenseController */
/* @var $model KasExpense */

$this->breadcrumbs=array(
	'Kas Expenses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KasExpense', 'url'=>array('index')),
	array('label'=>'Create KasExpense', 'url'=>array('create')),
	array('label'=>'View KasExpense', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KasExpense', 'url'=>array('admin')),
);
?>

<h1>Update KasExpense <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>