<?php
$this->breadcrumbs=array(
	'Data Requests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DataRequest', 'url'=>array('index')),
	array('label'=>'Create DataRequest', 'url'=>array('create')),
	array('label'=>'View DataRequest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DataRequest', 'url'=>array('admin')),
);
?>

<h3><?php echo Yii::t('ui', 'Update DataRequest ');?><?php echo $model->id; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>