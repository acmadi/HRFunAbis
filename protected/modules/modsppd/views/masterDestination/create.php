<?php
/* @var $this MasterDestinationController */
/* @var $model MasterDestination */

$this->breadcrumbs=array(
	'Master Destinations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterDestination', 'url'=>array('index')),
	array('label'=>'Manage MasterDestination', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Kota Tujuan',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>