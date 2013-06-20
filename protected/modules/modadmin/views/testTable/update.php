<?php
/* @var $this TestTableController */
/* @var $model TestTable */

$this->breadcrumbs=array(
	'Test Tables'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestTable', 'url'=>array('index')),
	array('label'=>'Create TestTable', 'url'=>array('create')),
	array('label'=>'View TestTable', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TestTable', 'url'=>array('admin')),
);
?>

<h1>Update TestTable <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>