<?php
/* @var $this RealNondinasController */
/* @var $model RealNondinas */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update Realisasi RAB Non-Dinas',
	$model->name,
	$model->explanation
);

$this->menu=array(
	array('label'=>'List RealNondinas', 'url'=>array('index')),
	array('label'=>'Create RealNondinas', 'url'=>array('create')),
	array('label'=>'View RealNondinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RealNondinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Realisasi Non Dinas #',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>