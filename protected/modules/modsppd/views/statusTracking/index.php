<?php
/* @var $this StatusTrackingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Status Trackings',
);

$this->menu=array(
	array('label'=>'Create StatusTracking', 'url'=>array('create')),
	array('label'=>'Manage StatusTracking', 'url'=>array('admin')),
);
?>

<h1>Status Trackings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
