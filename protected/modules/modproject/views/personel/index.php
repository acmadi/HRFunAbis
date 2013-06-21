<?php
/* @var $this PersonelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personels',
);

$this->menu=array(
	array('label'=>'Create Personel', 'url'=>array('create')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<h1>Personels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
