<?php
/* @var $this TestTableController */
/* @var $model TestTable */

$this->breadcrumbs=array(
	'Test Tables'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TestTable', 'url'=>array('index')),
	array('label'=>'Create TestTable', 'url'=>array('create')),
	array('label'=>'Update TestTable', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TestTable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestTable', 'url'=>array('admin')),
);
?>

<h1>View TestTable #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'test',
	),
)); ?>
