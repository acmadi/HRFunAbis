<?php
/* @var $this OtherReimburseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Other Reimburses',
);

$this->menu=array(
	array('label'=>'Create OtherReimburse', 'url'=>array('create')),
	array('label'=>'Manage OtherReimburse', 'url'=>array('admin')),
);
?>

<h1>Other Reimburses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
