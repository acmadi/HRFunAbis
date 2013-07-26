<?php
/* @var $this StatusTrackingController */
/* @var $model StatusTracking */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'status-tracking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'sppd_id'); ?>
		<?php echo $form->textField($model,'sppd_id'); ?>
		<?php echo $form->error($model,'sppd_id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',StatusTracking::model()->getStatusList(), array('empty'=>'pilih status')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'status_date'); ?>
		<?php echo $form->textField($model,'status_date'); ?>
		<?php echo $form->error($model,'status_date'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'notes_by'); ?>
		<?php echo $form->textField($model,'notes_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'notes_by'); ?>
	</div> -->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->