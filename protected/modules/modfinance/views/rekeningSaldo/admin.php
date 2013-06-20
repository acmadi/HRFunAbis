<?php
/* @var $this RekeningSaldoController */
/* @var $model RekeningSaldo */

$this->breadcrumbs=array(
	'Rekening Saldos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekeningSaldo', 'url'=>array('index')),
	array('label'=>'Create RekeningSaldo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rekening-saldo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Saldo Rekening : '.Yii::app()->session['bank'],
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>

