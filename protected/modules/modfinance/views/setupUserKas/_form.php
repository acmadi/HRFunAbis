<?php
/* @var $this SetupUserKasController */
/* @var $model SetupUserKas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setup-user-kas-form',
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
		<?php echo $form->labelEx($model,'code_kas'); ?>
		<?php echo $form->dropDownList($model,'code_kas',CHtml::listData(Kas::model()->findAll(), 'code_kas', 'code_kas'), array('empty'=>'select kas')); ?>
		<?php //echo $form->textField($model,'code_kas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code_kas'); ?>
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