<?php
/* @var $this RABNonDinasController */
/* @var $model RABNonDinas */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update RAB Non-Dinas',
	$model->name,
	$model->explanation,
);

$this->menu=array(
	array('label'=>'List RABNonDinas', 'url'=>array('index')),
	array('label'=>'Create RABNonDinas', 'url'=>array('create')),
	array('label'=>'View RABNonDinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update RAB Non-Dinas #',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>