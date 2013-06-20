<?php
/* @var $this ElbicodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Elbicodes',
);

$this->menu=array(
	array('label'=>'Create Elbicode', 'url'=>array('create')),
	array('label'=>'Manage Elbicode', 'url'=>array('admin')),
);
?>

<h1>Elbicodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
