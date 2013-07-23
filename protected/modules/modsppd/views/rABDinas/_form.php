<?php
/* @var $this RABDinasController */
/* @var $model RABDinas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rabdinas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_id'); ?>
		<?php echo $form->dropDownList($model,'employee_id',CHtml::listData(Personnel::model()->findAllByAttributes(array('sppd_id' => $sppd_id)),'employee_id','name'), array('empty'=>'pilih employee')); ?>
		<?php echo $form->error($model,'employee_id'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sppd_id'); ?>
		<?php echo $form->textField($model,'sppd_id'); ?>
		<?php echo $form->error($model,'sppd_id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'cost_description'); ?>
		<?php echo $form->textArea($model,'cost_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cost_description'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'base_amount'); ?>
		<?php echo $form->textField($model,'base_amount'); ?>
		<?php echo $form->error($model,'base_amount'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div> -->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->