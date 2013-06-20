<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'emergency-record-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'relationship'); ?>
		<?php echo $form->dropDownList($model,'relationship',$model->getRelationshipOptions()); ?>
		<?php echo $form->error($model,'relationship'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
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