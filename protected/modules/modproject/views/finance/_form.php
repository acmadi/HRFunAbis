<?php
/* @var $this FinanceController */
/* @var $model Finance */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'finance-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_number'); ?>
		<?php echo $form->textField($model,'project_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'project_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elbi'); ?>
		<?php echo $form->textField($model,'elbi',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'elbi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elbi_desc'); ?>
		<?php echo $form->textField($model,'elbi_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'elbi_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_month'); ?>
		<?php echo $form->textField($model,'period_month'); ?>
		<?php echo $form->error($model,'period_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debit'); ?>
		<?php echo $form->textField($model,'debit',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'debit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks'); ?>
		<?php echo $form->error($model,'remarks'); ?>
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