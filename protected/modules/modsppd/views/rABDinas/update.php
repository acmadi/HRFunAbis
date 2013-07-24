<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update RAB Dinas',
	$model->name,
	$model->cost_description,
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Create RABDinas', 'url'=>array('create')),
	array('label'=>'View RABDinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update RAB Dinas #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>