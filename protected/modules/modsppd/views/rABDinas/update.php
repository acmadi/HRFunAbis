<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'Rabdinases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Create RABDinas', 'url'=>array('create')),
	array('label'=>'View RABDinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<h1>Update RABDinas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>