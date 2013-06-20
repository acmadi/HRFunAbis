<?php
/* @var $this SetupUserBankController */
/* @var $model SetupUserBank */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SetupUserBank', 'url'=>array('index')),
	array('label'=>'Create SetupUserBank', 'url'=>array('create')),
	array('label'=>'View SetupUserBank', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SetupUserBank', 'url'=>array('admin')),
);
?>

<h1>Update SetupUserBank <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>