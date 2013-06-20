<?php
/* @var $this KasDcController */
/* @var $model KasDc */

$this->breadcrumbs=array(
	'Kas Dcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KasDc', 'url'=>array('index')),
	array('label'=>'Manage KasDc', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Input Kas</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>
<div class="row-fluid">
  	<div class="span12">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>