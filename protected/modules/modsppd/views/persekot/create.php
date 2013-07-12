<?php
/* @var $this PersekotController */
/* @var $model Persekot */

$this->breadcrumbs=array(
	'Persekots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Persekot', 'url'=>array('index')),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Persekot',
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>