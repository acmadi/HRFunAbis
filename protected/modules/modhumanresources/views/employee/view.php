<?php 
$this->widget('bootstrap.widgets.TbBreadcrumbs', array( 'links'=>array(
	'Employees'=>array('index'),
	$model->name,
)));

$this->menu=array(
	// array('label'=>'PersonalData', 'url'=>array('employee/view', 'id'=>$model->employee_id)),
	// array('label'=>'Dependent', 'url'=>array('dependent/dependent', 'employee_id'=>$model->employee_id)),
	// array('label'=>'Emergency', 'url'=>array('emergencyRecord/emergency', 'employee_id'=>$model->employee_id)),
	// array('label'=>'Education', 'url'=>array('education/education', 'employee_id'=>$model->employee_id)),
	// array('label'=>'Experience', 'url'=>array('jobExperience/experience', 'employee_id'=>$model->employee_id)),
	// array('label'=>'Certification', 'url'=>array('certification/certification', 'employee_id'=>$model->employee_id)),
	// array('label'=>'Kpi', 'url'=>array('kpi/kpi', 'employee_id'=>$model->employee_id)),
);
?>
<div class="well well-small">
<h3>Nomor Induk Pegawai : 00<?php echo $model->employee_id; ?></h3>
</div>


<?php 
$tabs = array(
	array('id' => 'tab1', 'label' => 'Info', 'content' => $this->renderPartial('pages/_summary', array('data' => $model), true), 'active' => true),
	array('id' => 'tab2', 'label' => 'Tanggungan', 'content' => $this->renderPartial('/dependent/pages/_dependent', array('data' => $dependent, 'model'=>new Dependent), true)),
	array('id' => 'tab3', 'label' => 'Kontak Emergency', 'content' => $this->renderPartial('/emergencyRecord/pages/_emergency', array('data' => $emergency, 'model'=>new EmergencyRecord), true)),
	array('id' => 'tab4', 'label' => 'Pendidikan(Formal)', 'content' => $this->renderPartial('/education/pages/_education', array('data' => $education, 'model'=>new Education), true)),
	array('id' => 'tab5', 'label' => 'Pendidikan(Informal)', 'content' => $this->renderPartial('/certification/pages/_certification', array('data' => $certification), true)),
	
	array('id' => 'tab6', 'label' => 'Keproyekan', 'content' => $this->renderPartial('/jobExperience/pages/_experience', array('data' => $experience), true)),
	
	array('id' => 'tab7', 'label' => 'Jabatan', 'content' => $this->renderPartial('/positionExp/pages/_experience', array('data' => $positionExp), true)),
	
	array('id' => 'tab8', 'label' => 'KPI', 'content' => $this->renderPartial('/kpi/pages/_kpi', array('data' => $kpi), true)),
);

$this->widget('bootstrap.widgets.TbWizard', array(
	'id' => 'mytabs',
	'type' => 'tabs',
	'placement'=> 'top',
	'tabs' => $tabs,
	//'htmlOptions' => array('class'=>'span20'),
));
?>