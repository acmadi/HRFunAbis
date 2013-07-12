<?php
/* @var $this PersekotDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persekot Details',
);

$this->menu=array(
	array('label'=>'Create PersekotDetail', 'url'=>array('create')),
	array('label'=>'Manage PersekotDetail', 'url'=>array('admin')),
);
?>

<h1>Persekot Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
