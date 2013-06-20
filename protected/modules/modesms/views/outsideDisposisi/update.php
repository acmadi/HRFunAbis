<?php
/* @var $this OutsideDisposisiController */
/* @var $model OutsideDisposisi */

$this->breadcrumbs=array(
	'Outside Disposisis'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OutsideDisposisi', 'url'=>array('index')),
	array('label'=>'Create OutsideDisposisi', 'url'=>array('create')),
	array('label'=>'View OutsideDisposisi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OutsideDisposisi', 'url'=>array('admin')),
);
?>

<h1>Update OutsideDisposisi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>