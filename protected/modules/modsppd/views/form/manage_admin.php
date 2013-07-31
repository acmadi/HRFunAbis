<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'SPPD'
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('form-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar SPPD',
	    'headerIcon' => 'icon-home',
	));		
?>

<?php 
	$this->widget('bootstrap.widgets.TbWizard', array(
		'id' => 'mytabs',
		'type' => 'tabs',
		'placement'=> 'top',
		'tabs' => $tabs,
		//'htmlOptions' => array('class'=>'span20'),
	));
	?>

<?php $this->endWidget(); ?>
