<?php
/* @var $this OutsideLetterController */
/* @var $model OutsideLetter */

$this->breadcrumbs=array(
	'Outside Letters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OutsideLetter', 'url'=>array('index')),
	array('label'=>'Create OutsideLetter', 'url'=>array('create')),
	array('label'=>'View OutsideLetter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OutsideLetter', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Input Surat #<?php echo $model->id; ?></h1>
</div>
<div class="row-fluid">
  	<div class="span12">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>