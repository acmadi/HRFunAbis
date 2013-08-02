<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'SPPD',
	'Report'
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('form-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php 
	$tabs = array(
		array('id' => 'tab1', 'label' => 'Search By Employee', 'content' => $this->renderPartial('report/_search_by_employee', array(), true), 'active'=>($tab == 1)),
		array('id' => 'tab2', 'label' => 'Search By Departement', 'content' => $this->renderPartial('report/_search_by_department', array(), true), 'active'=>($tab == 2)),
		array('id' => 'tab3', 'label' => 'Search By Period', 'content' => $this->renderPartial('report/_search_by_period', array(), true), 'active'=>($tab == 3)),
	);
?>

<?php $this->widget('bootstrap.widgets.TbWizard', array(
		'id' => 'mytabs',
		'type' => 'tabs',
		'placement'=> 'top',
		'pagerContent' => '',
		'tabs' => $tabs,
		//'htmlOptions' => array('class'=>'span20'),
	));
?>
<?php if (isset($data)): ?>
	

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Daftar SPPD',
	    'headerIcon' => 'icon-search',
	));		
?>

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'form-grid',
		'dataProvider'=>$data,
		// 'filter'=>$model,
		'columns'=>array(
			// 'id',
			// 'employee_id',
			'name',
			// 'service_provider',
			// 'unit',
			// 'class',
			'destination',
			'purpose',
			'departure',
			'arrival',
			// 'transport_type',
			// 'transport_vehicle',
			'sppd_type',
			'status',
			// 'statement_letter',
			// 'support_letter',
			// 'created_by',
			// 'created_date',
			array(
				'header'=>'amount',
				'value'=>'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->getTotal(),\'\'))',
				'footer'=>Yii::app()->numberFormatter->formatCurrency($totalAmount,''),
				'htmlOptions' => array ('style' => 'text-align:right'),
				'footerHtmlOptions' => array ('style' => 'text-align:right'),
			),
			array(
				'header' => 'kembali',
				'value' => 'CHtml::encode(Yii::app()->numberFormatter->formatCurrency($data->getRemains(),\'\'))',
				'footer'=>Yii::app()->numberFormatter->formatCurrency($totalRemains,''),
				'htmlOptions' => array ('style' => 'text-align:right'),
				'footerHtmlOptions' => array ('style' => 'text-align:right'),
			),
		),
	)); ?>

<?php $this->endWidget();?>
<?php endif ?>