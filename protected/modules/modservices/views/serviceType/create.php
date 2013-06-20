<?php
$this->breadcrumbs=array(
	'Service Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceType', 'url'=>array('index')),
	array('label'=>'Manage ServiceType', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Create ServiceType');?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>