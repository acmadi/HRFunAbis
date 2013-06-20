<?php
/* @var $this PeriodController */
/* @var $model Period */

$this->breadcrumbs=array(
	'Periods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Period', 'url'=>array('index')),
	array('label'=>'Create Period', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('period-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
	<h1>Manage Period</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'period-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'period_tag',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('period/ajaxupdate'),
			'placement' => 'right',
			)
		),
		//'period_tag',
		array(
			'class' => 'editable.EditableColumn',
				'name' => 'period_start',
				'headerHtmlOptions' => array('style' => 'width: 100px'),
				'editable' => array(
				'type' => 'date',
				'viewformat' => 'dd.mm.yyyy',
				'url' => $this->createUrl('period/ajaxupdate'),
				'placement' => 'right',
				)
		), 
		array(
			'class' => 'editable.EditableColumn',
				'name' => 'period_finish',
				'headerHtmlOptions' => array('style' => 'width: 100px'),
				'editable' => array(
				'type' => 'date',
				'viewformat' => 'dd.mm.yyyy',
				'url' => $this->createUrl('period/ajaxupdate'),
				'placement' => 'right',
				)
		), 
		//'period_start',
		//'period_finish',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Create', 'url'=>array('/modfinance/period/create'))
		),
	)); ?>
</div>