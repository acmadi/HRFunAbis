<?php
/* @var $this OtherReimburseController */
/* @var $model OtherReimburse */

$this->breadcrumbs=array(
	'Other Reimburses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OtherReimburse', 'url'=>array('index')),
	array('label'=>'Manage OtherReimburse', 'url'=>array('admin')),
);
?>

<h1>Create OtherReimburse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>