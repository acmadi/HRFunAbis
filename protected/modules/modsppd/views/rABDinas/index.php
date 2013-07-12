<?php
/* @var $this RABDinasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rabdinases',
);

$this->menu=array(
	array('label'=>'Create RABDinas', 'url'=>array('create')),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<h1>Rabdinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
