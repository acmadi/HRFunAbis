<?php
$this->breadcrumbs=array(
	'Menu Nesteds',
);

$this->menu=array(
	array('label'=>'Create Organization', 'url'=>array('create')),
	array('label'=>'Manage Organization', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Menu Nesteds');?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>false,
	'template'=>'{sorter}{pager}{summary}{items}{pager}',
	'itemView'=>'_view',
	'pager'=>array(
		'maxButtonCount'=>'7',
	),
	'sortableAttributes'=>array(
		'title',
	),
)); ?>

<br />