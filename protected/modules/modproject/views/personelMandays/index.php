<?php
/* @var $this PersonelMandaysController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personel Mandays',
);

$this->menu=array(
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<h1>Personel Mandays</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
