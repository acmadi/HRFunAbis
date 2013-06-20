<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certification-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php 
	echo $model->id;
	?>
	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'certification_name'); ?>
		<?php echo $form->textField($model,'certification_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'certification_name'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'year_certification'); ?>
		<?php echo $form->textField($model,'year_certification'); ?>
		<?php echo $form->error($model,'year_certification'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'year_expired'); ?>
		<?php echo $form->textField($model,'year_expired'); ?>
		<?php echo $form->error($model,'year_expired'); ?>
	</div>

	<div class="action">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'submit',
			'name'=>'btnSubmit',
			'value'=>'Submit',
			'caption'=>$model->isNewRecord ? Yii::t('ui', 'Create') : Yii::t('ui','Save'),
		));  ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->