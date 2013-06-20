<?php
/* @var $this KasController */
/* @var $model Kas */

$this->breadcrumbs=array(
	'Kases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Kas', 'url'=>array('index')),
	array('label'=>'Create Kas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
	<h1>Manage Kas</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'code_kas',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'code_kas',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('kas/ajaxupdate'),
			'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'nama_kas',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('kas/ajaxupdate'),
			'placement' => 'right',
			)
		),
		// array(
			// 'class' => 'editable.EditableColumn',
			// 'name' => 'code_proyek',
			// 'headerHtmlOptions' => array('style' => 'width: 110px'),
			// 'editable' => array( //editable section
			// 'url' => $this->createUrl('kas/ajaxupdate'),
			// 'placement' => 'right',
			// )
		// ),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'proyek_desc',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'type'=>'textarea',
			'url' => $this->createUrl('kas/ajaxupdate'),
			'placement' => 'right',
			)
		),
		
		//'nama_kas',
		//'code_proyek',
		//'proyek_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Create', 'url'=>array('/modfinance/kas/create'))
		),
	)); ?>
</div>