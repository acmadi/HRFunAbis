<?php
/* @var $this FinanceController */
/* @var $model Finance */

$this->breadcrumbs=array(
	'Finances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Finance', 'url'=>array('index')),
	array('label'=>'Manage Finance', 'url'=>array('admin')),
);
?>
<div class="well well-small">
	<h1>Create Finance</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>