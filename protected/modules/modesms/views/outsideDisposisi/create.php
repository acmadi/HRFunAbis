<?php
/* @var $this OutsideDisposisiController */
/* @var $model OutsideDisposisi */

$this->breadcrumbs=array(
	'Outside Disposisis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OutsideDisposisi', 'url'=>array('index')),
	array('label'=>'Manage OutsideDisposisi', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Disposisikan Surat</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'disposisi_to'=>$disposisi_to)); ?>