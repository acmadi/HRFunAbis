<?php
/* @var $this FormController */
/* @var $model Form */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

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
		<?php echo $form->textField($model,'class',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination'); ?>
		<?php echo $form->textField($model,'destination',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'destination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purpose'); ?>
		<?php echo $form->textArea($model,'purpose',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'purpose'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departure'); ?>
		<?php echo $form->textField($model,'departure'); ?>
		<?php echo $form->error($model,'departure'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arrival'); ?>
		<?php echo $form->textField($model,'arrival'); ?>
		<?php echo $form->error($model,'arrival'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_type'); ?>
		<?php echo $form->textField($model,'transport_type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'transport_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_vehicle'); ?>
		<?php echo $form->textField($model,'transport_vehicle',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'transport_vehicle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sppd_type'); ?>
		<?php echo $form->textField($model,'sppd_type',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sppd_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statement_letter'); ?>
		<?php echo $form->textField($model,'statement_letter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'statement_letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'support_letter'); ?>
		<?php echo $form->textField($model,'support_letter',array('size'=>60,'maxlength'=>200)); ?>
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
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->