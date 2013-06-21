<?php
/* @var $this ProcurementController */
/* @var $model Procurement */

$this->breadcrumbs=array(
	'Procurements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Procurement', 'url'=>array('index')),
	array('label'=>'Create Procurement', 'url'=>array('create')),
	array('label'=>'View Procurement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Procurement', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Pengadaan <?php echo $model->id; ?></h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>