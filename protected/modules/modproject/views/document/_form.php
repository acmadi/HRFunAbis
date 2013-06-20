<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_number'); ?>
		<?php echo $form->textArea($model,'project_number',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'project_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_id'); ?>
		<?php echo $form->textField($model,'task_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_number'); ?>
		<?php echo $form->textField($model,'document_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'document_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version_date'); ?>
		<?php echo $form->textField($model,'version_date'); ?>
		<?php echo $form->error($model,'version_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distribution'); ?>
		<?php echo $form->textField($model,'distribution',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'distribution'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'document_description'); ?>
		<?php echo $form->textArea($model,'document_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'document_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_attached'); ?>
		<?php echo $form->textField($model,'file_attached',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'file_attached'); ?>
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