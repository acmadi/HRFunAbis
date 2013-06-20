<?php
/* @var $this KasExpenseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kas Expenses',
);

$this->menu=array(
	array('label'=>'Create KasExpense', 'url'=>array('create')),
	array('label'=>'Manage KasExpense', 'url'=>array('admin')),
);
?>

<h1>Kas Expenses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
