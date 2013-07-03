<?php
/* @var $this PersonelController */
/* @var $model Personel */

$project = Project::model()->findByAttributes(array('number'=>$model->project_number));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('/modproject/project/view','id'=>$project->id,'task'=>'true'),
	'Personnel',
	'Create Personel',
)));

$this->menu=array(
	array('label'=>'List Personel', 'url'=>array('index')),
	array('label'=>'Manage Personel', 'url'=>array('admin')),
);
?>

<div class="well well-small">
<h1>Tambah Informasi Personil <?php echo Project::model()->getNameByNumber($model->project_number); ?></h1>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
