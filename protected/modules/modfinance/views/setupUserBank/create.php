<?php
/* @var $this SetupUserBankController */
/* @var $model SetupUserBank */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SetupUserBank', 'url'=>array('index')),
	array('label'=>'Manage SetupUserBank', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Setup User-Bank</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>