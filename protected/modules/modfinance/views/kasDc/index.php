<?php
/* @var $this KasDcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kas Dcs',
);

$this->menu=array(
	array('label'=>'Create KasDc', 'url'=>array('create')),
	array('label'=>'Manage KasDc', 'url'=>array('admin')),
);
?>

<h1>Kas Dcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
