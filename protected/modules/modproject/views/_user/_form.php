<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php //echo $form->errorSummary($model); ?>
		
	<div class="span6">
		<div class="row">
			<?php echo $form->labelEx($model,'employee_id'); ?>
			<?php echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'employee_id'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	<div class="span6">
		<div class="row">
			<?php echo $form->labelEx($model,'profile'); ?>
			<?php echo $form->textArea($model,'profile',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'profile'); ?>
		</div>

		
		<div class="row">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		</div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->