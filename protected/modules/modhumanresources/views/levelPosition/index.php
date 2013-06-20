<?php
$this->breadcrumbs=array(
	'Level Positions',
);

$this->menu=array(
	array('label'=>'Create LevelPosition', 'url'=>array('create')),
	array('label'=>'Manage LevelPosition', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Level Positions');?></h3>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'ajaxUpdate'=>false,
	'template'=>'{sorter}{pager}{summary}{items}{pager}',
	'itemView'=>'_view',
	'pager'=>array(
		'maxButtonCount'=>'7',
	),
	'sortableAttributes'=>array(
		'position',
	),
)); ?>

<br />
