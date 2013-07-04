<?php
/* @var $this PersonelMandaysController */
/* @var $model PersonelMandays */

$project = Project::model()->findByAttributes(array('number'=>Yii::app()->session['project_number']));
$personel = Personel::model()->findByAttributes(array('employee_id'=>$model->employee_id));
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Projects' => array('project/admin'),
	$project->name=>array('project/view','id'=>$project->id,'task'=>'true'),
	'Personnel',
	$personel->name=>array('personel/view','id'=>$personel->id),
	'Mandays'=>array('personelmandays/detail','employee_id'=>$personel->employee_id),
	'Update Hari Kerja'
)));

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'View PersonelMandays', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Update Hari Kerja '.$personel->name,
	));		
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	$this->endWidget();
?>