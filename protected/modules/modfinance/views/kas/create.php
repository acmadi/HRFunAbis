<?php
/* @var $this KasController */
/* @var $model Kas */

$this->breadcrumbs=array(
	'Kases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kas', 'url'=>array('index')),
	array('label'=>'Manage Kas', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Kas</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>