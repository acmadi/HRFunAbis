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
	'Detail Hari Kerja'
)));

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Create PersonelMandays', 'url'=>array('create')),
	array('label'=>'Update PersonelMandays', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonelMandays', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Hari Kerja '.$personel->name,
	));		
?>

<?php $this->widget('editable.EditableDetailView', array(
	'data'=>$model,
	//you can define any default params for child EditableFields
	'url' => $this->createUrl('personelmandays/ajaxupdate'), //common submit url for all fields
	'params' => array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken), //params for all fields
	'emptytext' => 'no value',
	'attributes'=>array(
		'id',
		'employee_id',
		array(
			'name'=>'month',
			'value'=>PersonelMandays::model()->getMonth($model->month),
			'editable' => array(
				'type' => 'select',
				'source' => PersonelMandays::model()->getPeriodOptions(),
			)
		),
		'mandays',
	),
)); ?>

<?php
	$this->endWidget();
?>