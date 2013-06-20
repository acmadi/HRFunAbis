<?php
/* @var $this InsideLetterController */
/* @var $model InsideLetter */

$this->breadcrumbs=array(
	'Inside Letters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List InsideLetter', 'url'=>array('index')),
	array('label'=>'Create InsideLetter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inside-letter-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Daftar Surat Keluar',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Input Surat', 'url'=>array('/modesms/insideLetter/create')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>