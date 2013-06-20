<?php
/* @var $this InsideLetterController */
/* @var $model InsideLetter */

$this->breadcrumbs=array(
	'Inside Letters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InsideLetter', 'url'=>array('index')),
	array('label'=>'Create InsideLetter', 'url'=>array('create')),
	array('label'=>'View InsideLetter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InsideLetter', 'url'=>array('admin')),
);
?>

<h1>Update InsideLetter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>