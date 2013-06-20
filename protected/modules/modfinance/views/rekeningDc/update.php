<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */

$this->breadcrumbs=array(
	'Rekening Dcs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekeningDc', 'url'=>array('index')),
	array('label'=>'Create RekeningDc', 'url'=>array('create')),
	array('label'=>'View RekeningDc', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RekeningDc', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Bank</h1>
</div>

<?php echo $this->renderPartial('_formupdate', array('model'=>$model)); ?>