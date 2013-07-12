<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */

$this->breadcrumbs=array(
	'Letter Costs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LetterCost', 'url'=>array('index')),
	array('label'=>'Create LetterCost', 'url'=>array('create')),
	array('label'=>'View LetterCost', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LetterCost', 'url'=>array('admin')),
);
?>

<h1>Update LetterCost <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>