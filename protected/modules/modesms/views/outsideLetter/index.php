<?php
/* @var $this OutsideLetterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Outside Letters',
);

$this->menu=array(
	array('label'=>'Create OutsideLetter', 'url'=>array('create')),
	array('label'=>'Manage OutsideLetter', 'url'=>array('admin')),
);
?>

<h1>Outside Letters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
