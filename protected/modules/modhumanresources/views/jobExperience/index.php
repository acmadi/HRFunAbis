<?php
$this->breadcrumbs=array(
	'Job Experiences',
);

$this->menu=array(
	array('label'=>'Create JobExperience', 'url'=>array('create')),
	array('label'=>'Manage JobExperience', 'url'=>array('admin')),
);
?>

<h1>Job Experiences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
