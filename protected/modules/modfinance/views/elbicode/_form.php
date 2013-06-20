<?php
/* @var $this ElbicodeController */
/* @var $model Elbicode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'elbicode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'akun'); ?>
		<?php echo $form->textField($model,'akun',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'akun'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'elbi'); ?>
		<?php echo $form->textField($model,'elbi',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'elbi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'elbi_desc'); ?>
		<?php echo $form->textField($model,'elbi_desc',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'elbi_desc'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->