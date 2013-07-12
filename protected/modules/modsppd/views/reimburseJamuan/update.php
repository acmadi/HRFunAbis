<?php
/* @var $this ReimburseJamuanController */
/* @var $model ReimburseJamuan */

$this->breadcrumbs=array(
	'Reimburse Jamuans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReimburseJamuan', 'url'=>array('index')),
	array('label'=>'Create ReimburseJamuan', 'url'=>array('create')),
	array('label'=>'View ReimburseJamuan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Reimburse Jamuan #',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>