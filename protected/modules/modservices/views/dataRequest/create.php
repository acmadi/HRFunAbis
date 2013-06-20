<?php
$this->breadcrumbs=array(
	'Data Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DataRequest', 'url'=>array('index')),
	array('label'=>'Manage DataRequest', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Create DataRequest');?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>