<?php
$this->breadcrumbs=array(
	'Employee Statuses',
);

$this->menu=array(
	array('label'=>'Create Status', 'url'=>array('create')),
	array('label'=>'Manage Status', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Employee Statuses');?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
