<?php
/* @var $this ReimburseJamuanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reimburse Jamuans',
);

$this->menu=array(
	array('label'=>'Create ReimburseJamuan', 'url'=>array('create')),
	array('label'=>'Manage ReimburseJamuan', 'url'=>array('admin')),
);
?>

<h1>Reimburse Jamuans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
