<?php
/* @var $this KasController */
/* @var $model Kas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code_kas'); ?>
		<?php echo $form->textField($model,'code_kas', array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code_kas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_kas'); ?>
		<?php echo $form->textField($model,'nama_kas', array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nama_kas'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'code_proyek'); ?>
		<?php //echo $form->textField($model,'code_proyek',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'code_proyek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proyek_desc'); ?>
		<?php echo $form->textField($model,'proyek_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'proyek_desc'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->