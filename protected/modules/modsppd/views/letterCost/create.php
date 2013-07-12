<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Surat Biaya Perjalanan Dinas',
	));		
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>
