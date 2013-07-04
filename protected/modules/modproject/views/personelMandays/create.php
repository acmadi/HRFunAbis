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
	'Tambah Hari Kerja'
)));

$this->menu=array(
	array('label'=>'List PersonelMandays', 'url'=>array('index')),
	array('label'=>'Manage PersonelMandays', 'url'=>array('admin')),
);
?>

<?php
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'Tambah Hari Kerja<br/>
					ID Pegawai: '.$model->employee_id.
					'<br/>Nama Pegawai: '.Personel::model()->getNameByEmployeeId($model->employee_id),
	));		
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
	$this->endWidget();
?>