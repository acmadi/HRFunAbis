<?php
/* @var $this InsideLetterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inside Letters',
);

$this->menu=array(
	array('label'=>'Create InsideLetter', 'url'=>array('create')),
	array('label'=>'Manage InsideLetter', 'url'=>array('admin')),
);
?>

<h1>Inside Letters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
