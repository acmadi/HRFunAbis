<?php
/* @var $this RABNonDinasController */
/* @var $model RABNonDinas */

$this->breadcrumbs=array(
	'Rabnon Dinases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RABNonDinas', 'url'=>array('index')),
	array('label'=>'Create RABNonDinas', 'url'=>array('create')),
	array('label'=>'View RABNonDinas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<h1>Update RABNonDinas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>