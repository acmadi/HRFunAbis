<?php
/* @var $this ElbicodeController */
/* @var $model Elbicode */

$this->breadcrumbs=array(
	'Elbicodes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Elbicode', 'url'=>array('index')),
	array('label'=>'Create Elbicode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('elbicode-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
	<h1>Manage Elbi</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'elbicode-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'akun',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'akun',
			'headerHtmlOptions' => array('style' => 'width: 50px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('elbicode/ajaxupdate'),
			'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'elbi',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('elbicode/ajaxupdate'),
			'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'elbi_desc',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'type' => 'textarea',
			'url' => $this->createUrl('elbicode/ajaxupdate'),
			'placement' => 'right',
			)
		),
		//'elbi_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Create', 'url'=>array('/modfinance/elbicode/create'))
		),
	)); ?>
</div>