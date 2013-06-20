<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */

$this->breadcrumbs=array(
	'Outside Letters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OutsideLetter', 'url'=>array('index')),
	array('label'=>'Manage OutsideLetter', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Input Surat Masuk</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>