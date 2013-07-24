<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Tambah Reimburse Jamuan',
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Reimburse Jamuan',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>