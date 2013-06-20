<?php
/* @var $this DisposisiTreeController */
/* @var $model DisposisiTree */

$this->breadcrumbs=array(
	'Disposisi Trees'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DisposisiTree', 'url'=>array('index')),
	array('label'=>'Create DisposisiTree', 'url'=>array('create')),
	array('label'=>'View DisposisiTree', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DisposisiTree', 'url'=>array('admin')),
);
?>

<h1>Update DisposisiTree <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>