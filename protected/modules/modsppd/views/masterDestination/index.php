<?php
/* @var $this MasterDestinationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Destinations',
);

$this->menu=array(
	array('label'=>'Create MasterDestination', 'url'=>array('create')),
	array('label'=>'Manage MasterDestination', 'url'=>array('admin')),
);
?>

<h1>Master Destinations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
