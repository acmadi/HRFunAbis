<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'job-experience-form',
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
		<?php echo $form->labelEx($model,'period_start'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'period_start'),
			'value'=>$model->period_start,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php echo $form->error($model,'period_start'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'period_finish'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'period_finish'),
			'value'=>$model->period_finish,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php echo $form->error($model,'period_finish'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'company'); ?>
		<?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'company'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'job_description'); ?>
		<?php echo $form->textField($model,'job_description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'job_description'); ?>
	</div>

	<div class="action">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'submit',
			'name'=>'btnSubmit',
			'value'=>'Submit',
			'caption'=>$model->isNewRecord ? Yii::t('ui', 'Create') : Yii::t('ui','Save'),
		));  ?>
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnCancel',
			'value'=>'Cancel',
			'caption'=>Yii::t('ui', 'Cancel'),
			'url'=>array('/modhumanresources/employee/view', 'id'=>$model->employee_id),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->