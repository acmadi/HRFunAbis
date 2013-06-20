<?php
$this->breadcrumbs=array(
	'Certifications',
);

$this->menu=array(
	array('label'=>'Create Certification', 'url'=>array('create')),
	array('label'=>'Manage Certification', 'url'=>array('admin')),
);
?>

<h1>Certifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
