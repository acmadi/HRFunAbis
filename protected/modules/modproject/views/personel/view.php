<?php
/* @var $this PersonelController */
/* @var $model Personel */

$this->breadcrumbs=array(
	'Personels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Create Personel', 'url'=>array('create')),
	array('label'=>'Update Personel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Personel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<h1>View Personel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_number',
		'employee_id',
		'name',
		'position',
		'position_task',
		'start_join',
		'end_join',
		'telepon',
		'email',
		'remarks',
		'created_by',
		'created_date',
	),
)); ?>
