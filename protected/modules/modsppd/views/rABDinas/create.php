<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'Rabdinases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah RAB Dinas',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'sppd_id'=>$sppd_id)); ?>

<?php $this->endWidget(); ?>