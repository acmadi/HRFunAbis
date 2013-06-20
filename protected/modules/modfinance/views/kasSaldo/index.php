<?php
/* @var $this KasSaldoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kas Saldos',
);

$this->menu=array(
	array('label'=>'Create KasSaldo', 'url'=>array('create')),
	array('label'=>'Manage KasSaldo', 'url'=>array('admin')),
);
?>

<h1>Kas Saldos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
