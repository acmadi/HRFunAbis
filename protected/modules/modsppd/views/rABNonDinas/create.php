<?php
/* @var $this RABNonDinasController */
/* @var $model RABNonDinas */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Tambah RAB Non-Dinas',
);

$this->menu=array(
	array('label'=>'List RABNonDinas', 'url'=>array('index')),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah RAB Non-Dinas',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model,'sppd_id'=>$sppd_id)); ?>

<?php $this->endWidget(); ?>