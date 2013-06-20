<?php
/* @var $this TestTableController */
/* @var $model TestTable */

$this->breadcrumbs=array(
	'Test Tables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestTable', 'url'=>array('index')),
	array('label'=>'Manage TestTable', 'url'=>array('admin')),
);
?>

<h1>Create TestTable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>