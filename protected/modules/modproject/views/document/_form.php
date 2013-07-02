<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="row-fluid">
  <div class="span12">
	<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'document-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); ?>


		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type',$model->getDocType(), array('empty'=>'select document type')); ?>
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
				<?php echo CHtml::activeLabelEx($model,'version_date'); ?>
				<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'version_date'),
					'value'=>$model->version_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
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
			<?php echo $form->textArea($model,'document_description',array('rows'=>6, 'cols'=>50, 'class'=>'span10')); ?>
			<?php echo $form->error($model,'document_description'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'file_attached'); ?>
			<?php echo $form->fileField($model,'file_attached',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'file_attached'); ?>
		</div>


		<div class="form-actions">
		<?php /*echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); */?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
   </div>
</div>