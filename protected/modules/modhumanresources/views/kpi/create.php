<?php
/* @var $this KpiController */
/* @var $model Kpi */

$this->breadcrumbs=array(
	'Kpis'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List Kpi', 'url'=>array('index')),
	// array('label'=>'Manage Kpi', 'url'=>array('admin')),
);
?>

<div class="well well-small">
	<h1>Tambah KPI</h1>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

	
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>