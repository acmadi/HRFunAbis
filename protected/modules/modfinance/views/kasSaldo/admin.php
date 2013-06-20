<?php
/* @var $this KasSaldoController */
/* @var $model KasSaldo */

$this->breadcrumbs=array(
	'Kas Saldos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KasSaldo', 'url'=>array('index')),
	array('label'=>'Create KasSaldo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kas-saldo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Saldo Kas : '.Yii::app()->session['kas'],
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>