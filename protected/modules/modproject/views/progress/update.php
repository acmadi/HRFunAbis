<?php
/* @var $this ProgressController */
/* @var $model Progress */

$this->breadcrumbs=array(
	'Progresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Create Progress', 'url'=>array('create')),
	array('label'=>'View Progress', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Update Progress <?php echo $model->id; ?></h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>