<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<h1>Create LetterCost</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>