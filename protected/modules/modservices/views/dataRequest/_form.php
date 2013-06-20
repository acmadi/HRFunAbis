<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'data-request-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<fieldset><legend>Request Info</legend>
	<div class = "span-10">
		<div class="row">
			<?php echo $form->labelEx($model,'request_type'); ?>
			<?php //echo $form->textField($model,'request_type',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->dropDownList($model,'request_type', CHtml::listData(ServiceType::model()->findAll(), 'type', 'type'),array('empty'=>'pilih')); ?>
			<?php echo $form->error($model,'request_type'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_date'); ?>
			<?php //echo $form->textField($model,'request_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'request_date'),
						'value'=>$model->request_date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
			<?php echo $form->error($model,'request_date'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_by'); ?>
			<?php echo $form->textField($model,'request_by',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'request_by'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_phone_email'); ?>
			<?php echo $form->dropDownList($model,'request_phone_email', DataRequest::model()->getPhoneOrMail(),array('empty'=>'pilih')); ?>
			<?php echo $form->error($model,'request_phone_email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_division'); ?>
			<?php echo $form->dropDownList($model,'request_division',CHtml::listData(Department::model()->findAll(), 'department', 'department'), array('empty'=>'pilih unit kerja')); ?>
			<?php //echo $form->textField($model,'request_division',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'request_division'); ?>
		</div>
	</div>
	<div class = "span-10">
		<div class="row">
			<?php echo $form->labelEx($model,'request_issue'); ?>
			<?php echo $form->textField($model,'request_issue',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'request_issue'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_description'); ?>
			<?php echo $form->textArea($model,'request_description',array('simples'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'request_description'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_attachment'); ?>
			<?php echo $form->fileField($model,'request_attachment'); ?>
			<?php echo $form->error($model,'request_attachment'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	
	</div>
	</fieldset>
	<fieldset><legend>Request Solution</legend>
	<div class = "span-20">
		
		<div class="row">
			<?php echo $form->labelEx($model,'request_solved_by'); ?>
			<?php echo $form->textField($model,'request_solved_by',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'request_solved_by'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'request_answer'); ?>
			<?php echo $form->textArea($model,'request_answer',array('simples'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'request_answer'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'request_close_date'); ?>
			<?php //echo $form->textField($model,'request_close_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'request_close_date'),
						'value'=>$model->request_close_date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
			<?php echo $form->error($model,'request_close_date'); ?>
		</div>
		
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>
	</fieldset>
	
<?php $this->endWidget(); ?>

</div><!-- form -->