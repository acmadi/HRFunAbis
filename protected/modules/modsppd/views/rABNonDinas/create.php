<?php
/* @var $this RABNonDinasController */
/* @var $model RABNonDinas */

$this->breadcrumbs=array(
	'Rabnon Dinases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RABNonDinas', 'url'=>array('index')),
	array('label'=>'Manage RABNonDinas', 'url'=>array('admin')),
);
?>

<h1>Create RABNonDinas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>