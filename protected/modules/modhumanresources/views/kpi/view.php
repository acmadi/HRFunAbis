<?php
/* @var $this KpiController */
/* @var $model Kpi */

$this->breadcrumbs=array(
	'Kpis'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Kpi', 'url'=>array('index')),
	array('label'=>'Create Kpi', 'url'=>array('create')),
	array('label'=>'Update Kpi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kpi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kpi', 'url'=>array('admin')),
);
?>

<h1>View Kpi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'start',
		'finish',
		'sasaran_kerja',
		'bentuk_target',
		'realisasi',
		'bobot',
		'nilai',
		'nilai_kinerja',
		'created_date',
		'update_by',
	),
)); ?>
