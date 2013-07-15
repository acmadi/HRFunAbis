<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>
Step 1 of 2
<div class="progress progress-striped active">
  <div class="bar" style="width: 50%;"></div>
</div>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah SPPD',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>