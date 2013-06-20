<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */

$this->breadcrumbs=array(
	'Rekening Dcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RekeningDc', 'url'=>array('index')),
	array('label'=>'Manage RekeningDc', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Input Rekening</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<div class="row-fluid">
  	<div class="span12">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>