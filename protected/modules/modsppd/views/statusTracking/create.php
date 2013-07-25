<?php
/* @var $this StatusTrackingController */
/* @var $model StatusTracking */

$this->breadcrumbs=array(
	'Status Trackings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusTracking', 'url'=>array('index')),
	array('label'=>'Manage StatusTracking', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Status SPPD',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>