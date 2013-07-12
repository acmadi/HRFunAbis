<?php
/* @var $this RABNonDinasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rabnon Dinases',
);

$this->menu=array(
	array('label'=>'Create RABNonDinas', 'url'=>array('create')),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<h1>Rabnon Dinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
