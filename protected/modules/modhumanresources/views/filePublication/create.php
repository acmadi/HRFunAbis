<?php
/* @var $this FilePublicationController */
/* @var $model FilePublication */

$this->breadcrumbs=array(
	'File Publications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FilePublication', 'url'=>array('index')),
	array('label'=>'Manage FilePublication', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Upload File</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>