<?php
/* @var $this RekeningDcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekening Dcs',
);

$this->menu=array(
	array('label'=>'Create RekeningDc', 'url'=>array('create')),
	array('label'=>'Manage RekeningDc', 'url'=>array('admin')),
);
?>

<h1>Rekening Dcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
