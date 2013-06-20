<?php
/* @var $this OutsideDisposisiController */
/* @var $model OutsideDisposisi */

$this->breadcrumbs=array(
	'Outside Disposisis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OutsideDisposisi', 'url'=>array('index')),
	array('label'=>'Create OutsideDisposisi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('outside-disposisi-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
$this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Surat Masuk',
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>
