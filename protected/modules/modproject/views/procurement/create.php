<?php
/* @var $this ProcurementController */
/* @var $model Procurement */

$this->breadcrumbs=array(
	'Procurements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Procurement', 'url'=>array('index')),
	array('label'=>'Manage Procurement', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Tambah Pengadaan</h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>