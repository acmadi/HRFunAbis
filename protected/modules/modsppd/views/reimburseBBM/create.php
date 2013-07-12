<?php
/* @var $this ReimburseBBMController */
/* @var $model ReimburseBBM */

$this->breadcrumbs=array(
	'Reimburse Bbms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReimburseBBM', 'url'=>array('index')),
	array('label'=>'Manage ReimburseBBM', 'url'=>array('admin')),
);
?>

<h1>Create ReimburseBBM</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>