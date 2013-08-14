
<?php
/**
 * Dashboar khusus untuk sppd yang baru diajukan / belum dipertanggung jawabkan
 */
/* @var $this FormController */
/* @var $model Form */
$id = $model->id;
$sppd_status = $model->status;
$emp_id = $model->employee_id;

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
<div class="row-fluid">
  	<?php if (($model->statement_letter != '' || $model->support_letter != '') && $model->status == 'PAID' && Yii::app()->user->getEmployeeID() == $model->employee_id) { ?>
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Pertanggungjawaban',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url'=>array('pertanggungjawaban','id'=>$model->id),
			)); ?>
		</div>
	<?php } ?>
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
	
	$tabs = array(
		array('id' => 'tab1', 'label' => 'Persekot', 'content' => $this->renderPartial('pages/_persekot', array('data' => $persekot), true), 'active' => $tab1),
		array('id' => 'tab2', 'label' => 'Personil', 'content' => $this->renderPartial('pages/_personnels', array('data' => $personnels), true), 'active' => $tab2),
		array('id' => 'tab4', 'label' => 'RAB DINAS', 'content' => $this->renderPartial('pages/_rab_dinas', array('data' => $rabdinas, 'sppd_id'=>$model->id), true), 'active' => $tab4),
		array('id' => 'tab5', 'label' => 'RAB NON DINAS', 'content' => $this->renderPartial('pages/_rab_non_dinas', array('data' => $rabnondinas, 'sppd_id'=>$model->id), true), 'active' => $tab5),
		array('id' => 'tab6', 'label' => 'Statement Letter', 'content' => $this->renderPartial('pages/_statement_letter', array('data' => $model), true), 'active' => $tab6),
		array('id' => 'tab7', 'label' => 'Support Letter', 'content' => $this->renderPartial('pages/_support_letter', array('data' => $model), true), 'active' => $tab7),
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
	  	<?php if ($sppd_status == 'MANAGER_REVIEWED' || $sppd_status == 'MANAGER_APPROVED' || $sppd_status == 'CREATED' || $sppd_status == 'FINANCE_REVIEWED'): ?>
	  	<div class="form-actions">
	  		<?php if (($sppd_status == 'MANAGER_REVIEWED' || $sppd_status == 'CREATED') && $emp_id == Yii::app()->user->getEmployeeID()) : ?>
		  	<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Request for Manager Approval',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'REQUEST_FOR_MANAGER_APPROVAL'),
			    'htmlOptions' => array(
			    		'style' => 'width:200px',
			    		'confirm' => 'Mengirim Permohonan?',
			    		),
			)); ?>
	  		<?php endif ?>

			<?php if (($sppd_status == 'MANAGER_APPROVED' || $sppd_status == 'FINANCE_REVIEWED') && $emp_id == Yii::app()->user->getEmployeeID()): ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Request for Finance Approval',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'REQUEST_FOR_FINANCE_APPROVAL'),
			    'htmlOptions' => array(
			    		'style' => 'width:200px',
			    		'confirm' => 'Mengirim Permohonan?',
			    		),
			)); ?>
			<?php endif ?>
		</div>
	  	<?php endif ?>

	  	<!-- Manager -->
	  	<?php if (Yii::app()->user->isRole('Super->Sppd->Manager') && $sppd_status == 'REQUEST_FOR_MANAGER_APPROVAL'): ?>
	  	<div class="form-actions">
		  	<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Approve',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'MANAGER_APPROVED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Approve SPPD ini?',
			    		),
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Review',
			    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'MANAGER_REVIEWED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Review SPPD ini?',
			    		),
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Reject',
			    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'REJECTED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Reject SPPD ini?',
			    		),
			)); ?>
		</div>
	  	<?php endif ?>
	  	
	  	<!-- Finance -->
	  	<?php if (Yii::app()->user->isRole('Super->Sppd->Finance') && ($sppd_status == 'REQUEST_FOR_FINANCE_APPROVAL' || $sppd_status == 'FINANCE_VALIDATED')): ?>
	  	<div class="form-actions">
	  		<?php if ($sppd_status == 'REQUEST_FOR_FINANCE_APPROVAL'): ?>
		  	<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Validate',
			    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'FINANCE_VALIDATED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Validate SPPD ini?',
			    		),
			)); ?>

			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Review',
			    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'FINANCE_REVIEWED'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'Review SPPD ini?',
			    		),
			)); ?>
	  		<?php endif ?>

	  		<?php if ($sppd_status == 'FINANCE_VALIDATED'): ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'Paid',
			    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			    'size'=>'large', // null, 'large', 'small' or 'mini'
			    'url' => array('statusTracking/create','id'=>$id,'status'=>'PAID'),
			    'htmlOptions' => array(
			    		'style' => 'width:80px',
			    		'confirm' => 'SPPD sudah dibayar?',
			    		),
			)); ?>
	  		<?php endif ?>

		</div>
	  	<?php endif ?>
	</div>
</div>





