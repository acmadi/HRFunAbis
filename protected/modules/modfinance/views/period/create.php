<?php
/* @var $this PeriodController */
/* @var $model Period */

$this->breadcrumbs=array(
	'Periods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Period', 'url'=>array('index')),
	array('label'=>'Manage Period', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Create Period</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>