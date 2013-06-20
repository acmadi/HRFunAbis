<?php
$this->breadcrumbs=array(
	'Employees',
);

$this->menu=array(
	array('label'=>'Create Employee', 'url'=>array('create')),
	array('label'=>'Manage Employee', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Employees');?></h3>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>false,
	'template'=>'{sorter}{pager}{summary}{items}{pager}',
	'itemView'=>'_view',
	'pager'=>array(
		'maxButtonCount'=>'7',
	),
	'sortableAttributes'=>array(
		'name',
		'department',
		'position',
	),
)); ?>

<br />