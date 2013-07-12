<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Create LetterCost', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('letter-cost-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Letter Costs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'letter-cost-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'airport_tax_cost',
		'airport_tax_quantity',
		'laundry_cost',
		'laundry_quantity',
		'airline_cost',
		/*
		'airline_quantity',
		'hotel_cost',
		'hotel_quantity',
		'transportation_cost',
		'transportation_quantity',
		'from_to_cost',
		'from_to_quantity',
		'lumpsum_cost',
		'lumpsum_quantity',
		'created_date',
		'created_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
