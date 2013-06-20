<?php
$this->breadcrumbs=array(
	'Job Experiences',
);

$this->menu=array(
	array('label'=>'Create PositionExp', 'url'=>array('create')),
	array('label'=>'Manage PositionExp', 'url'=>array('admin')),
);
?>

<h1>Pengalaman Jabatan</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
