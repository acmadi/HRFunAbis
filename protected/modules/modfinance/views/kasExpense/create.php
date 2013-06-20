<?php
/* @var $this KasExpenseController */
/* @var $model KasExpense */

$this->breadcrumbs=array(
	'Kas Expenses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KasExpense', 'url'=>array('index')),
	array('label'=>'Manage KasExpense', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Input Expense</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<div class="row-fluid">
  	<div class="span12">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>

