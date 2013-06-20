<?php
/* @var $this RekeningController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekenings',
);

$this->menu=array(
	array('label'=>'Create Rekening', 'url'=>array('create')),
	array('label'=>'Manage Rekening', 'url'=>array('admin')),
);
?>

<h1>Rekenings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
