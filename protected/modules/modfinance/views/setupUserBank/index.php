<?php
/* @var $this SetupUserBankController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Setup User Kases',
);

$this->menu=array(
	array('label'=>'Create SetupUserBank', 'url'=>array('create')),
	array('label'=>'Manage SetupUserBank', 'url'=>array('admin')),
);
?>

<h1>Setup User Kases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
