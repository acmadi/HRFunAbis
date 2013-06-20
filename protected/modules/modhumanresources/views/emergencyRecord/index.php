<?php
$this->breadcrumbs=array(
	'Emergency Records',
);

$this->menu=array(
	array('label'=>'Create EmergencyRecord', 'url'=>array('create')),
	array('label'=>'Manage EmergencyRecord', 'url'=>array('admin')),
);
?>

<h1>Emergency Records</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
