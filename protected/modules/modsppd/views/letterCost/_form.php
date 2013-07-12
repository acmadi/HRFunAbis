<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'letter-cost-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_tax_cost'); ?>
		<?php echo $form->textField($model,'airport_tax_cost'); ?>
		<?php echo $form->error($model,'airport_tax_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_tax_quantity'); ?>
		<?php echo $form->textField($model,'airport_tax_quantity'); ?>
		<?php echo $form->error($model,'airport_tax_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laundry_cost'); ?>
		<?php echo $form->textField($model,'laundry_cost'); ?>
		<?php echo $form->error($model,'laundry_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laundry_quantity'); ?>
		<?php echo $form->textField($model,'laundry_quantity'); ?>
		<?php echo $form->error($model,'laundry_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airline_cost'); ?>
		<?php echo $form->textField($model,'airline_cost'); ?>
		<?php echo $form->error($model,'airline_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airline_quantity'); ?>
		<?php echo $form->textField($model,'airline_quantity'); ?>
		<?php echo $form->error($model,'airline_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_cost'); ?>
		<?php echo $form->textField($model,'hotel_cost'); ?>
		<?php echo $form->error($model,'hotel_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_quantity'); ?>
		<?php echo $form->textField($model,'hotel_quantity'); ?>
		<?php echo $form->error($model,'hotel_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transportation_cost'); ?>
		<?php echo $form->textField($model,'transportation_cost'); ?>
		<?php echo $form->error($model,'transportation_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transportation_quantity'); ?>
		<?php echo $form->textField($model,'transportation_quantity'); ?>
		<?php echo $form->error($model,'transportation_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_to_cost'); ?>
		<?php echo $form->textField($model,'from_to_cost'); ?>
		<?php echo $form->error($model,'from_to_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_to_quantity'); ?>
		<?php echo $form->textField($model,'from_to_quantity'); ?>
		<?php echo $form->error($model,'from_to_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lumpsum_cost'); ?>
		<?php echo $form->textField($model,'lumpsum_cost'); ?>
		<?php echo $form->error($model,'lumpsum_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lumpsum_quantity'); ?>
		<?php echo $form->textField($model,'lumpsum_quantity'); ?>
		<?php echo $form->error($model,'lumpsum_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->