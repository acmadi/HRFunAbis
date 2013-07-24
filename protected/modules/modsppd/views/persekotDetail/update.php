<?php
/* @var $this PersekotDetailController */
/* @var $model PersekotDetail */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update Persekot',
	$model->description,
);

$this->menu=array(
	array('label'=>'List PersekotDetail', 'url'=>array('index')),
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
	array('label'=>'View PersekotDetail', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Detail Persekot #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>