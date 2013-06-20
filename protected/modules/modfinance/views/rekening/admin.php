<?php
/* @var $this RekeningController */
/* @var $model Rekening */

$this->breadcrumbs=array(
	'Rekenings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Rekening', 'url'=>array('index')),
	array('label'=>'Create Rekening', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rekening-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="well well-small">
	<h1>Manage Rekening</h1>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekening-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'akun',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('rekening/ajaxupdate'),
			'placement' => 'right',
			)
		),
		// array(
			// 'class' => 'editable.EditableColumn',
			// 'name' => 'kode_pembantu',
			// 'headerHtmlOptions' => array('style' => 'width: 110px'),
			// 'editable' => array( //editable section
			// 'url' => $this->createUrl('rekening/ajaxupdate'),
			// 'placement' => 'right',
			// )
		// ),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'nomor_rek',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('rekening/ajaxupdate'),
			'placement' => 'right',
			)
		),
		array(
			'class' => 'editable.EditableColumn',
			'name' => 'bank',
			'headerHtmlOptions' => array('style' => 'width: 110px'),
			'editable' => array( //editable section
			'url' => $this->createUrl('rekening/ajaxupdate'),
			'placement' => 'right',
			)
		),
		// 'akun',
		// 'nomor_rek',
		// 'bank',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
		'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		'buttons'=>array(
			array('label'=>'Create', 'url'=>array('/modfinance/rekening/create'))
		),
	)); ?>
</div>
