<?php
/* @var $this RekeningController */
/* @var $model Rekening */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekening-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'akun'); ?>
		<?php echo $form->textField($model,'akun',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'akun'); ?>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($model,'kode_pembantu'); ?>
		<?php //echo $form->textField($model,'kode_pembantu',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'kode_pembantu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor_rek'); ?>
		<?php echo $form->textField($model,'nomor_rek',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nomor_rek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->textField($model,'bank',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->