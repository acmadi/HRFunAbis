<?php
/* @var $this KasDcController */
/* @var $model KasDc */

$this->breadcrumbs=array(
	'Kas Dcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List KasDc', 'url'=>array('index')),
	array('label'=>'Create KasDc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.well').toggle();
	return false;
});
");
?>

<?php 
    $this->widget('bootstrap.widgets.TbBox', array(
    'title' => 'Transaksi Kas : '.Yii::app()->session['kas'],
    'headerIcon' => 'icon-home',
    'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons'=>array(
				array('label'=>'Input Kas', 'url'=>array('/modfinance/kasDc/create')),
			),
		),
    ),
	'content'=> $this->renderPartial('_admin', array('model' => $model), true),
	));
?>
