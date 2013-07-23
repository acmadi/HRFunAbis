<?php
/* @var $this RealNondinasController */
/* @var $model RealNondinas */

$this->breadcrumbs=array(
	'Real Nondinases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
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