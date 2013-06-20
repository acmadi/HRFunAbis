<?php
/* @var $this DisposisiTreeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Disposisi Trees',
);

$this->menu=array(
	array('label'=>'Create DisposisiTree', 'url'=>array('create')),
	array('label'=>'Manage DisposisiTree', 'url'=>array('admin')),
);
?>

<h1>Disposisi Trees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
