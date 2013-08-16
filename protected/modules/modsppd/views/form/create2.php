<?php
/* @var $this FormController */
/* @var $model Form */

$this->breadcrumbs=array(
	'SPPD'=>array('admin'),
	'Tambah SPPD',
	'Personil'
);

$this->menu=array(
	array('label'=>'List Form', 'url'=>array('index')),
	array('label'=>'Manage Form', 'url'=>array('admin')),
);
?>

Step 2 of 4
<div class="progress progress-striped active">
  <div class="bar" style="width: 50%;"></div>
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
	    'title' => 'Informasi Personil',
	    'headerButtons' => array(
			array(
				'class' => 'bootstrap.widgets.TbButtonGroup',
				'buttons'=>array(
					array('label'=>'Tambah Personil', 'url'=>array('/modsppd/personnel/create','id'=>$model->id)),
				),
			),
	    ),
	));		
?>
<div class="row-fluid">
	<div class="span12">
		<?php
			$this->renderPartial('pages/_personnels',array(
				'data'=>$personnels,
				'sppd_id'=>$model->id,
				));
		?>	
	</div>
</div>
<?php $this->endWidget() ?>

<div class="form-actions">

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Sebelumnya',
	    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions' => array(
    					// 'style' => 'width:50px',
    					),
	    'url'=>array('create','id'=>$model->id),
	)); ?>

	<?php $this->widget('bootstrap.widgets.TbButton', array(
	    'label'=>'Selanjutnya',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions' => array(
    					// 'style' => 'width:50px',
    					),
	    'url'=>array('createStep3','id'=>$model->id),
	)); ?>
</div>


