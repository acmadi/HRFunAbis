<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */

$this->breadcrumbs=array(
	'Outside Letters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OutsideLetter', 'url'=>array('index')),
	array('label'=>'Create OutsideLetter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('outside-letter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Daftar Surat Masuk',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Input Surat', 'url'=>array('/modesms/outsideLetter/create')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>