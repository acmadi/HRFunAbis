<?php
/* @var $this FilePublicationController */
/* @var $model FilePublication */

$this->breadcrumbs=array(
	'File Publications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FilePublication', 'url'=>array('index')),
	array('label'=>'Create FilePublication', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('file-publication-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Data Pegawai',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Upload', 'url'=>array('/modhumanresources/filePublication/create')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>
