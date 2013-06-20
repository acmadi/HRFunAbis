<?php
$this->breadcrumbs=array(
	'Service Types',
);

$this->menu=array(
	array('label'=>'Create ServiceType', 'url'=>array('create')),
	array('label'=>'Manage ServiceType', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Service Types');?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
