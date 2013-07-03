<?php
/* @var $this ProgressController */
/* @var $model Progress */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->breadcrumbs=array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'progress'=>'true'),
	'Progress',
	'Create Progress',
);

$this->menu=array(
	array('label'=>'List Progress', 'url'=>array('index')),
	array('label'=>'Manage Progress', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Tambah Informasi Progress <?php echo Project::model()->getNameByNumber($model->project_number)?></h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
