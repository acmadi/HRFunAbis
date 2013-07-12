<?php
/* @var $this MasterCostController */
/* @var $model MasterCost */

$this->breadcrumbs=array(
	'Master Costs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterCost', 'url'=>array('index')),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Master Biaya',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	$this->endWidget();
?>