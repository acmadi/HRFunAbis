<?php
/* @var $this HierarchyController */
/* @var $model Hierarchy */

$this->breadcrumbs=array(
	'Hierarchies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hierarchy', 'url'=>array('index')),
	array('label'=>'Create Hierarchy', 'url'=>array('create')),
	array('label'=>'View Hierarchy', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hierarchy', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Hierarki #',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>