<?php
/* @var $this RekeningController */
/* @var $model Rekening */

$this->breadcrumbs=array(
	'Rekenings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rekening', 'url'=>array('index')),
	array('label'=>'Manage Rekening', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Rekening</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>