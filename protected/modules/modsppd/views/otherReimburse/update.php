<?php
/* @var $this OtherReimburseController */
/* @var $model OtherReimburse */

$this->breadcrumbs=array(
	'Other Reimburses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OtherReimburse', 'url'=>array('index')),
	array('label'=>'Create OtherReimburse', 'url'=>array('create')),
	array('label'=>'View OtherReimburse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OtherReimburse', 'url'=>array('admin')),
);
?>

<h1>Update OtherReimburse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>