<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'SPPD'=>array('admin'),
	'Tambah SPPD',
	'Rancangan Anggaran Biaya'
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

Step 3 of 4
<div class="progress progress-striped active">
  <div class="bar" style="width: 75%;"></div>
</div>

<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Informasi SPPD',
	));		
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
				'event_start_date',
				'event_end_date',
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
<?php $this->endWidget() ?>
<?php
	$this->beginWidget('bootstrap.widgets.TbBox', array(
	    'title' => 'Informasi RAB',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah RAB', 'url'=>array('/modsppd/'.(($model->sppd_type == 'Dinas')?'rabdinas':'rabnondinas').'/create','id'=>$model->id)),
				),
			),
	    ),
	));		
?>
<div class="row-fluid">
	<div class="span12">
		<?php
			if ($model->sppd_type == 'Dinas') {
				$this->renderPartial('pages/_rab_dinas',array(
					'data'=>$rablist,
					'sppd_id'=>$model->id,
					));
			} else {
				$this->renderPartial('pages/_rab_non_dinas',array(
					'data'=>$rablist,
					'sppd_id'=>$model->id,
					));
			}
		?>	
	</div>
</div>
<?php $this->endWidget() ?>

<div class="form-actions">
	<p>Apakah anda ingin mengajukan persekot?</p>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Ya',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions' => array(
    					'style' => 'width:50px',
    					'confirm' => 'Anda yakin untuk membuat persekot?',
    					),
	    'url'=>array('createStep4','id'=>$model->id),
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Tidak',
	    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions' => array(
	    					'style' => 'width:50px',
	    					'confirm' => 'Anda yakin tidak membuat persekot?',
	    					),
	    'url'=>array('createFinished','id'=>$model->id),
	)); ?>
</div>


