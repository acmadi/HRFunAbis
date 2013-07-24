<?php
/* @var $this ReimburseBBMController */
/* @var $model ReimburseBBM */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Tambah Reimburse BBM',
	$model->transaction_description
);

$this->menu=array(
	array('label'=>'List ReimburseBBM', 'url'=>array('index')),
	array('label'=>'Manage ReimburseBBM', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Reimburse BBM',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>