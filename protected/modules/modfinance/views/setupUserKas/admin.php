<?php
/* @var $this SetupUserKasController */
/* @var $model SetupUserKas */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SetupUserKas', 'url'=>array('index')),
	array('label'=>'Create SetupUserKas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('setup-user-kas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
<h1>Kelola User-Kas</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setup-user-kas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'code_kas',
		'active_since',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Create', 'url'=>array('/modfinance/setupUserKas/create'))
		),
	)); ?>
</div>
