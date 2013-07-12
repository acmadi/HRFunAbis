<?php
/* @var $this PersekotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persekots',
);

$this->menu=array(
	array('label'=>'Create Persekot', 'url'=>array('create')),
	array('label'=>'Manage Persekot', 'url'=>array('admin')),
);
?>

<h1>Persekots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
