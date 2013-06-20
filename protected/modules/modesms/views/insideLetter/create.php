<?php
/* @var $this InsideLetterController */
/* @var $model InsideLetter */

$this->breadcrumbs=array(
	'Inside Letters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InsideLetter', 'url'=>array('index')),
	array('label'=>'Manage InsideLetter', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Buat Surat Keluar</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>