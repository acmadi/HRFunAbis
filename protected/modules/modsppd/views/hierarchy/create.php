<?php
/* @var $this HierarchyController */
/* @var $model Hierarchy */

$this->breadcrumbs=array(
	'Hierarchies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hierarchy', 'url'=>array('index')),
	array('label'=>'Manage Hierarchy', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Hierarki',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>