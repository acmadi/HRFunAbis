<?php
/* @var $this KasExpenseController */
/* @var $model KasExpense */

$this->breadcrumbs=array(
	'Kas Expenses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KasExpense', 'url'=>array('index')),
	array('label'=>'Create KasExpense', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kas-expense-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Pengeluaran Kas',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Kas Keluar', 'url'=>array('/modfinance/kasExpense/create')),
				//array('label'=>'Submit', 'url'=>array('/modfinance/kasExpense/submit')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>

