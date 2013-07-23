<?php
/* @var $this RealNondinasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Real Nondinases',
);

$this->menu=array(
	array('label'=>'Create RealNondinas', 'url'=>array('create')),
	array('label'=>'Manage RealNondinas', 'url'=>array('admin')),
);
?>

<h1>Real Nondinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
