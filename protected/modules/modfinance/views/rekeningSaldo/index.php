<?php
/* @var $this RekeningSaldoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekening Saldos',
);

$this->menu=array(
	array('label'=>'Create RekeningSaldo', 'url'=>array('create')),
	array('label'=>'Manage RekeningSaldo', 'url'=>array('admin')),
);
?>

<h1>Rekening Saldos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
