<?php
/* @var $this SetupUserBankController */
/* @var $model SetupUserBank */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setup-user-bank-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->dropDownList($model,'employee_id',CHtml::listData(User::model()->findAll(), 'employee_id', 'username'), array('empty'=>'select employee')); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor_rek'); ?>
		<?php echo $form->dropDownList($model,'nomor_rek',CHtml::listData(Rekening::model()->findAll(), 'nomor_rek', 'bank'), array('empty'=>'select bank')); ?>
		<?php //echo $form->textField($model,'nomor_rek',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nomor_rek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active_since'); ?>
		<?php echo $form->textField($model,'active_since'); ?>
		<?php echo $form->error($model,'active_since'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->