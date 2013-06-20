<?php
/* @var $this SetupUserBankController */
/* @var $model SetupUserBank */

$this->breadcrumbs=array(
	'Setup User Kases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SetupUserBank', 'url'=>array('index')),
	array('label'=>'Create SetupUserBank', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('setup-user-bank-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
<h1>Kelola User-Bank</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setup-user-bank-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'nomor_rek',
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
			array('label'=>'Create', 'url'=>array('/modfinance/setupUserBank/create'))
		),
	)); ?>
</div>
