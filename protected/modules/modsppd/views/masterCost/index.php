<?php
/* @var $this MasterCostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Costs',
);

$this->menu=array(
	array('label'=>'Create MasterCost', 'url'=>array('create')),
	array('label'=>'Manage MasterCost', 'url'=>array('admin')),
);
?>

<h1>Master Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
