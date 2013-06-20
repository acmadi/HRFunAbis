<?php
/* @var $this KasSaldoController */
/* @var $model KasSaldo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kas-saldo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code_kas'); ?>
		<?php echo $form->textField($model,'code_kas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code_kas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'akumulasi_saldo'); ?>
		<?php echo $form->textField($model,'akumulasi_saldo',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'akumulasi_saldo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transaksi'); ?>
		<?php echo $form->textField($model,'transaksi',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'transaksi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
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