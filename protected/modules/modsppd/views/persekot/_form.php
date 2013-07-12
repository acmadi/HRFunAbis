<?php
/* @var $this PersekotController */
/* @var $model Persekot */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persekot-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sppd_id'); ?>
		<?php echo $form->textField($model,'sppd_id'); ?>
		<?php echo $form->error($model,'sppd_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paid_to'); ?>
		<?php echo $form->textField($model,'paid_to',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'paid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'received_from'); ?>
		<?php echo $form->textField($model,'received_from',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'received_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount_in_words'); ?>
		<?php echo $form->textArea($model,'amount_in_words',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'amount_in_words'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_giro_date'); ?>
		<?php echo $form->textField($model,'check_giro_date'); ?>
		<?php echo $form->error($model,'check_giro_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'check_giro_number'); ?>
		<?php echo $form->textField($model,'check_giro_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'check_giro_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_code'); ?>
		<?php echo $form->textField($model,'currency_code',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'currency_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_code'); ?>
		<?php echo $form->textField($model,'bank_code',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'bank_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'journal_number'); ?>
		<?php echo $form->textField($model,'journal_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'journal_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voucher_number'); ?>
		<?php echo $form->textField($model,'voucher_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'voucher_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voucher_date'); ?>
		<?php echo $form->textField($model,'voucher_date'); ?>
		<?php echo $form->error($model,'voucher_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->