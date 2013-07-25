<?php
/* @var $this StatusTrackingController */
/* @var $model StatusTracking */

$this->breadcrumbs=array(
	'Status Trackings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusTracking', 'url'=>array('index')),
	array('label'=>'Create StatusTracking', 'url'=>array('create')),
	array('label'=>'View StatusTracking', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StatusTracking', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Status SPPD #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>