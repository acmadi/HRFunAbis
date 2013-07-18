<?php
/**
 * Dashboar khusus untuk sppd yang baru diajukan / belum dipertanggung jawabkan
 */
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'Forms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Create Form', 'url'=>array('create')),
	array('label'=>'Update Form', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Form', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

<div class="row-fluid">
  <div class="span12">
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'employee_id',
				'name',
				'service_provider',
				'unit',
				'class',
				'destination',
				'purpose',
			),
		)); ?>
	</div>
	<div class="span6">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'departure',
				'arrival',
				'transport_type',
				'transport_vehicle',
				'sppd_type',
				'statement_letter',
				'support_letter',
			),
		)); ?>
	</div>
  </div>
</div>
<br/>
<div class="row-fluid">
  <div class="span12">
	<?php 
	$tab1 = true;
	$tab2 = false;
	$tab4 = false;//if($rab_dinas) {$tab4 = true; $tab0 = false;}
	$tab5 = false;//if($rab_non_dinas) {$tab5 = true; $tab0 = false;}
	$tab6 = false;
	$tab7 = false;
	$tab8 = false;
	$tab9 = false;
	$tab10 = false;
	$tab11 = false;
	$tab12 = false;
	$tab13 = false;
	
	$tabs = array(
		array('id' => 'tab1', 'label' => 'Persekot', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab1),
		array('id' => 'tab2', 'label' => 'Personil', 'content' => $this->renderPartial('pages/_personnels', array('data' => $personnels), true), 'active' => $tab2),
		array('id' => 'tab4', 'label' => 'RAB DINAS', 'content' => $this->renderPartial('pages/_rab_dinas', array('data' => $rabdinas, 'sppd_id'=>$model->id), true), 'active' => $tab4),
		array('id' => 'tab5', 'label' => 'RAB NON DINAS', 'content' => $this->renderPartial('pages/_rab_non_dinas', array('data' => $rabnondinas, 'sppd_id'=>$model->id), true), 'active' => $tab5),
		array('id' => 'tab6', 'label' => 'Statement Letter', 'content' => $this->renderPartial('pages/_statement_letter', array('data' => $model), true), 'active' => $tab6),
		array('id' => 'tab7', 'label' => 'Support Letter', 'content' => $this->renderPartial('pages/_support_letter', array('data' => $model), true), 'active' => $tab7),
		array('id' => 'tab8', 'label' => 'Reimburse Jamuan', 'content' => $this->renderPartial('pages/_reimburse_jamuan', array('data' => $model), true), 'active' => $tab8),
		array('id' => 'tab9', 'label' => 'Reimburse BBM', 'content' => $this->renderPartial('pages/_reimburse_bbm', array('data' => $model), true), 'active' => $tab9),
		array('id' => 'tab10', 'label' => 'Reimburse Lainnya', 'content' => $this->renderPartial('pages/_other_reimburse', array('data' => $model), true), 'active' => $tab10),
		array('id' => 'tab11', 'label' => 'Persekot2', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab11),
		array('id' => 'tab12', 'label' => 'Persekot3', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab12),
		array('id' => 'tab13', 'label' => 'Rincian Realisasi', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab13),
	);

	$this->widget('bootstrap.widgets.TbWizard', array(
		'id' => 'mytabs',
		'type' => 'tabs',
		'placement'=> 'top',
		'tabs' => $tabs,
		//'htmlOptions' => array('class'=>'span20'),
	));
	?>
  </div>
</div>


