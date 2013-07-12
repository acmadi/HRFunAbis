<?php
/* @var $this PersekotController */
/* @var $model Persekot */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sppd_id'); ?>
		<?php echo $form->textField($model,'sppd_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paid_to'); ?>
		<?php echo $form->textField($model,'paid_to',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'received_from'); ?>
		<?php echo $form->textField($model,'received_from',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount_in_words'); ?>
		<?php echo $form->textArea($model,'amount_in_words',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_giro_date'); ?>
		<?php echo $form->textField($model,'check_giro_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'check_giro_number'); ?>
		<?php echo $form->textField($model,'check_giro_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_code'); ?>
		<?php echo $form->textField($model,'currency_code',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_code'); ?>
		<?php echo $form->textField($model,'bank_code',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'journal_number'); ?>
		<?php echo $form->textField($model,'journal_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voucher_number'); ?>
		<?php echo $form->textField($model,'voucher_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voucher_date'); ?>
		<?php echo $form->textField($model,'voucher_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->