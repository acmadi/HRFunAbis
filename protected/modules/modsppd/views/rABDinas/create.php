<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */

$this->breadcrumbs=array(
	'Rabdinases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RABDinas', 'url'=>array('index')),
	array('label'=>'Manage RABDinas', 'url'=>array('admin')),
);
?>

<h1>Create RABDinas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>