<?php
$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'PersonalData', 'url'=>array('employee/view', 'id'=>$employee_id)),
	array('label'=>'Dependent', 'url'=>array('dependent/dependent', 'employee_id'=>$employee_id)),
	array('label'=>'Emergency', 'url'=>array('emergencyRecord/emergency', 'employee_id'=>$employee_id)),
	array('label'=>'Education', 'url'=>array('education/education', 'employee_id'=>$employee_id)),
	array('label'=>'Experience', 'url'=>array('jobExperience/experience', 'employee_id'=>$employee_id)),
	array('label'=>'Certification', 'url'=>array('certification/certification', 'employee_id'=>$employee_id)),
);
?>

<h3><?php echo Yii::t('ui', 'Manage Dependent');?></h3>

<?php $this->renderPartial('../flashMessage/flash_message_detail');?>
<br>


<?php $this->widget('CTabView',array(
	'activeTab'=>'tab4',
	'tabs'=>array(
		'tab0'=>array(
			'title'=>'Personal Data',
			'url'=>Yii::app()->createUrl('modhumanresources/employee/view', array('id'=>$employee_id)),
		),
		'tab1'=>array(
			'title'=>'Dependent',
			'url'=>Yii::app()->createUrl('modhumanresources/dependent/dependent', array('employee_id'=>$employee_id)),
		),
		'tab2'=>array(
			'title'=>'Emergency',
			'url'=>Yii::app()->createUrl('modhumanresources/emergencyRecord/emergency', array('employee_id'=>$employee_id)),
		),
		'tab3'=>array(
			'title'=>'Education',
			'url'=>Yii::app()->createUrl('modhumanresources/education/education', array('employee_id'=>$employee_id)),
		),
		'tab4'=>array(
			'title'=>'Experience',
			'view'=>'pages/_experience',
			'data'=>array('data'=>$model, 'employee_id'=>$employee_id,),
		),
		'tab5'=>array(
			'title'=>'Certification',
			'url'=>Yii::app()->createUrl('modhumanresources/certification/certification', array('employee_id'=>$employee_id)),
		),
	),
	'htmlOptions'=>array(
		'style'=>'width:800px;'
	)
)); ?>