<?php
/* @var $this OtherReimburseController */
/* @var $model OtherReimburse */

$this->breadcrumbs=array(
	'SPPD'=>array('form/admin'),
	Yii::app()->session['sppd_name']=>array('form/view','id'=>Yii::app()->session['sppd_id']),
	'Update Reimburse Lainnya',
	$model->date,
	$model->elbi
);

$this->menu=array(
	array('label'=>'List OtherReimburse', 'url'=>array('index')),
	array('label'=>'Create OtherReimburse', 'url'=>array('create')),
	array('label'=>'View OtherReimburse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OtherReimburse', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Reimburse Lainnya #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>