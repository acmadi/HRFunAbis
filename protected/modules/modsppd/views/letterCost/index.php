<?php
/* @var $this LetterCostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Letter Costs',
);

$this->menu=array(
	array('label'=>'Create LetterCost', 'url'=>array('create')),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<h1>Letter Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
