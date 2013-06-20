<?php
$this->breadcrumbs=array(
	'Departments',
);

$this->menu=array(
	array('label'=>'Manage Department', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Departments');?></h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
