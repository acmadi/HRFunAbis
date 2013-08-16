<?php
/* @var $this FormController */
/* @var $model Form */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'service_provider'); ?>
		<?php echo $form->textField($model,'service_provider',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'service_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->dropDownList($model,'class',CHtml::listData(MasterCost::model()->findAll(),'class','class'), array('empty'=>'pilih golongan')); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination'); ?>
		<?php echo $form->dropDownList($model,'destination',CHtml::listData(MasterDestination::model()->findAll(),'city','city'), array('empty'=>'pilih kota tujuan')); ?>
		<?php echo $form->error($model,'destination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textArea($model,'purpose',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'purpose'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_start_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'event_start_date'),
					'value'=>$model->event_start_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'event_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_end_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'event_end_date'),
					'value'=>$model->event_end_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'event_end_date'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'departure'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'departure'),
					'value'=>$model->departure,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'departure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arrival'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'arrival'),
					'value'=>$model->arrival,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'arrival'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_type'); ?>
		<?php echo $form->dropDownList($model,'transport_type',array(
																'Sendiri'=>'Sendiri',
																'Kendaraan Dinas'=>'Kendaraan Dinas'
															), array('empty'=>'pilih jenis transportasi')); ?>
		<?php echo $form->error($model,'transport_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_vehicle'); ?>
		<?php echo $form->dropDownList($model,'transport_vehicle',array(
																'Pesawat Udara'=>'Pesawat Udara',
																'Kereta Api'=>'Kereta Api',
																'Kendaraan Dinas'=>'Kendaraan Dinas',
																'Bus/Lain-Lain'=>'Bus/Lain-Lain'
															), array('empty'=>'pilih kendaraan')); ?>
		<?php echo $form->error($model,'transport_vehicle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sppd_type'); ?>
		<?php echo $form->dropDownList($model,'sppd_type',array(
																'Dinas'=>'Dinas',
																'Non-Dinas'=>'Non-Dinas',
																'Luar Negri'=>'Luar Negri'
															), array('empty'=>'pilih jenis sppd')); ?>
		<?php echo $form->error($model,'sppd_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statement_letter'); ?>
		<?php echo $form->fileField($model,'statement_letter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'statement_letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'support_letter'); ?>
		<?php echo $form->fileField($model,'support_letter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'support_letter'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div> -->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Selanjutnya')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->