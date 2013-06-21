<?php
/* @var $this PersonelMandaysController */
/* @var $model PersonelMandays */

$this->breadcrumbs=array(
	'Personel Mandays'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'View PersonelMandays', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Update PersonelMandays <?php echo $model->id; ?></h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>