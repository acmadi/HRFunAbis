<?php
/* @var $this AttachmentController */
/* @var $model Attachment */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update Lampiran',
	$model->name
);

$this->menu=array(
	array('label'=>'List Attachment', 'url'=>array('index')),
	array('label'=>'Create Attachment', 'url'=>array('create')),
	array('label'=>'View Attachment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Attachment', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Attachment #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>
