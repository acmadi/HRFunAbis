<?php
$this->breadcrumbs=array(
	'Dependents',
);

$this->menu=array(
	array('label'=>'Create Dependent', 'url'=>array('create')),
	array('label'=>'Manage Dependent', 'url'=>array('admin')),
);
?>

<h1>Dependents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
