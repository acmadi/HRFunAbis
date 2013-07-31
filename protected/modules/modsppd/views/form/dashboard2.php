<?php
/**
 * Dashboar khusus untuk sppd yang baru diajukan / belum dipertanggung jawabkan
 */
/* @var $this FormController */
/* @var $model Form */
$id = $model->id;
$sppd_status = $model->status;

$this->breadcrumbs=array(
	'SPPD'=>array('admin'),
	$model->purpose,
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
	$tab1 = (!isset($_GET['t']))?true:false;
	$tab2 = (isset($_GET['t']) && $_GET['t'] == 2)?true:false;
	$tab4 = (isset($_GET['t']) && $_GET['t'] == 3)?true:false;;//if($rab_dinas) {$tab4 = true; $tab0 = false;}
	$tab5 = (isset($_GET['t']) && $_GET['t'] == 4)?true:false;;//if($rab_non_dinas) {$tab5 = true; $tab0 = false;}
	$tab6 = (isset($_GET['t']) && $_GET['t'] == 5)?true:false;;
	$tab7 = (isset($_GET['t']) && $_GET['t'] == 6)?true:false;;
	$tab8 = (isset($_GET['t']) && $_GET['t'] == 7)?true:false;;
	$tab9 = (isset($_GET['t']) && $_GET['t'] == 8)?true:false;;
	$tab10 = (isset($_GET['t']) && $_GET['t'] == 9)?true:false;;
	$tab11 = (isset($_GET['t']) && $_GET['t'] == 10)?true:false;;
	$tab12 = (isset($_GET['t']) && $_GET['t'] == 11)?true:false;;
	$tab13 = (isset($_GET['t']) && $_GET['t'] == 12)?true:false;;
	$tab14 = (isset($_GET['t']) && $_GET['t'] == 13)?true:false;;
	
	$tabs = array(
		array('id' => 'tab1', 'label' => 'Persekot', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab1),
		array('id' => 'tab2', 'label' => 'Personil', 'content' => $this->renderPartial('pages/_personnels', array('data' => $personnels), true), 'active' => $tab2),
		array('id' => 'tab4', 'label' => 'RAB Dinas', 'content' => $this->renderPartial('pages/_rab_dinas', array('data' => $rabdinas, 'sppd_id'=>$model->id), true), 'active' => $tab4),
		array('id' => 'tab5', 'label' => 'RAB Non Dinas', 'content' => $this->renderPartial('pages/_rab_non_dinas', array('data' => $rabnondinas, 'sppd_id'=>$model->id), true), 'active' => $tab5),
		array('id' => 'tab6', 'label' => 'Statement Letter', 'content' => $this->renderPartial('pages/_statement_letter', array('data' => $model), true), 'active' => $tab6),
		array('id' => 'tab7', 'label' => 'Support Letter', 'content' => $this->renderPartial('pages/_support_letter', array('data' => $model), true), 'active' => $tab7),
		array('id' => 'tab8', 'label' => 'Reimburse Jamuan', 'content' => $this->renderPartial('pages/_reimburse_jamuan', array('data' => $rjamuan, 'sppd_id'=>$model->id), true), 'active' => $tab8),
		array('id' => 'tab9', 'label' => 'Reimburse BBM', 'content' => $this->renderPartial('pages/_reimburse_bbm', array('data' => $rbbm, 'sppd_id'=>$model->id), true), 'active' => $tab9),
		array('id' => 'tab10', 'label' => 'Reimburse Lainnya', 'content' => $this->renderPartial('pages/_other_reimburse', array('data' => $rother, 'sppd_id'=>$model->id), true), 'active' => $tab10),
		array('id' => 'tab11', 'label' => 'Persekot2', 'content' => $this->renderPartial('pages/_persekot2', array('data' => $persekot2), true), 'active' => $tab11),
		array('id' => 'tab12', 'label' => 'Persekot3', 'content' => $this->renderPartial('pages/_persekot3', array('data' => $persekot3), true), 'active' => $tab12),
		array('id' => 'tab13', 'label' => 'Rincian Realisasi', 'content' => $this->renderPartial('pages/_rincian_realisasi', array('data' => $realisasi), true), 'active' => $tab13),
		array('id' => 'tab14', 'label' => 'Lampiran', 'content' => $this->renderPartial('pages/_attachments', array('data' => $attachments, 'sppd_id'=>$model->id), true), 'active' => $tab14),
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
<div class="row-fluid">
	<div class="span12">
		<?php
			$this->beginWidget('bootstrap.widgets.TbBox', array(
			    'title' => 'Status SPPD',
			));		
		?>

	  	<?php
	  		$model = new StatusTracking('search');
		  	$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'status-tracking-grid',
				'dataProvider'=>$status,
				// 'filter'=>$model,
				'columns'=>array(
					array(
						'header'=>'No',
						'value'=>'$row+1',
					),
					// 'id',
					// 'sppd_id',
					'status',
					'status_date',
					'notes',
					'notes_by',
				),
			));
	  	?>

	  	<?php $this->endWidget() ?>

	  	<!-- Normal User -->
	  	<?php if (!Yii::app()->user->isRole('Super->Sppd->Finance') && ($sppd_status == 'ON_PROCESS' || $sppd_status == 'ACCOUNTABILITY_REVIEWED')): ?>
	  	<div class="form-actions">
	  		<?php if ($sppd_status == 'ON_PROCESS' || $sppd_status == 'ACCOUNTABILITY_REVIEWED'): ?>
		  	<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Request for Accountability Approval',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'REQUEST_FOR_ACCOUNTABILITY_APPROVAL'),
			    'htmlOptions' => array(
			    		'style' => 'width:200px',
			    		'confirm' => 'Mengirim Permohonan?',
			    		),
			)); ?>
	  		<?php endif ?>
		</div>
	  	<?php endif ?>

	  	<!-- Finance -->
	  	<?php if (Yii::app()->user->isRole('Super->Sppd->Finance') && $sppd_status == 'REQUEST_FOR_ACCOUNTABILITY_APPROVAL'): ?>
	  	<div class="form-actions">
		  	<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Review',
			    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'ACCOUNTABILITY_REVIEWED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Review Pertanggungjawaban ini?',
			    		),
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Close',
			    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'CLOSED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Tutup SPPD ini?',
			    		),
			)); ?>

		</div>
	  	<?php endif ?>
	</div>

</div>


