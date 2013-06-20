<?php
/* @var $this TestTableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Tables',
);

$this->menu=array(
	array('label'=>'Create TestTable', 'url'=>array('create')),
	array('label'=>'Manage TestTable', 'url'=>array('admin')),
);
?>

<h1>Test Tables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
