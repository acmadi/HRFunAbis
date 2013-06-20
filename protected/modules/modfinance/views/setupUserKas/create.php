<?php
/* @var $this SetupUserKasController */
/* @var $model SetupUserKas */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SetupUserKas', 'url'=>array('index')),
	array('label'=>'Manage SetupUserKas', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Setup User - Kas</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>