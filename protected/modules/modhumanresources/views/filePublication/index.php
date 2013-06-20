<?php
/* @var $this FilePublicationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'File Publications',
);

$this->menu=array(
	array('label'=>'Create FilePublication', 'url'=>array('create')),
	array('label'=>'Manage FilePublication', 'url'=>array('admin')),
);
?>

<h1>File Publications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
