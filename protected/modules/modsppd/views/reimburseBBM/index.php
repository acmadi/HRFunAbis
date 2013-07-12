<?php
/* @var $this ReimburseBBMController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reimburse Bbms',
);

$this->menu=array(
	array('label'=>'Create ReimburseBBM', 'url'=>array('create')),
	array('label'=>'Manage ReimburseBBM', 'url'=>array('admin')),
);
?>

<h1>Reimburse Bbms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
