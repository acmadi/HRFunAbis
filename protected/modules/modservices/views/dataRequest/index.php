<?php
$this->breadcrumbs=array(
	'Data Requests',
);

$this->menu=array(
	array('label'=>'Create DataRequest', 'url'=>array('create')),
	array('label'=>'Manage DataRequest', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Data Requests');?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
