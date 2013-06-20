<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */

$this->breadcrumbs=array(
	'Rekening Dcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekeningDc', 'url'=>array('index')),
	array('label'=>'Create RekeningDc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rekening-dc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
$this->widget('bootstrap.widgets.TbBox', array(
'title' => 'Transaksi Bank : '.Yii::app()->session['bank'],
'headerIcon' => 'icon-home',
'headerButtons' => array(
	array(
		'class' => 'bootstrap.widgets.TbButtonGroup',
		'buttons'=>array(
			array('label'=>'Input Bank', 'url'=>array('/modfinance/rekeningDc/create')),
			array('label'=>'Pengeluaran Bank', 'url'=>array('/modfinance/rekeningDc/tarikBank')),
		),
	),
),
'content'=> $this->renderPartial('_admin', array('model' => $model), true),
));
?>
