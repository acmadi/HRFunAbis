<?php
/* @var $this OutsideDisposisiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Outside Disposisis',
);

$this->menu=array(
	array('label'=>'Create OutsideDisposisi', 'url'=>array('create')),
	array('label'=>'Manage OutsideDisposisi', 'url'=>array('admin')),
);
?>

<h1>Outside Disposisis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
