<?php
/* @var $this ProgressController */
/* @var $model Progress */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'progress-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_number'); ?>
		<?php echo $form->textField($model,'project_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'project_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'period_date'),
					'value'=>$model->period_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'period_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_week'); ?>
		<?php echo $form->textField($model,'period_week'); ?>
		<?php echo $form->error($model,'period_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_month'); ?>
		<?php echo $form->dropDownList($model,'period_month',Progress::model()->getPeriodMonths()); ?>
		<?php echo $form->error($model,'period_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_year'); ?>
		<?php echo $form->textField($model,'period_year'); ?>
		<?php echo $form->error($model,'period_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'progress'); ?>
		<?php echo $form->textField($model,'progress'); ?>
		<?php echo $form->error($model,'progress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termin_pgn'); ?>
		<?php echo $form->textArea($model,'termin_pgn',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'termin_pgn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termin_vendor'); ?>
		<?php echo $form->textArea($model,'termin_vendor',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'termin_vendor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'progress_actual'); ?>
		<?php echo $form->textField($model,'progress_actual',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'progress_actual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'progress_plan'); ?>
		<?php echo $form->textField($model,'progress_plan',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'progress_plan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'progress_this_week'); ?>
		<?php echo $form->textArea($model,'progress_this_week',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'progress_this_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'completed_work'); ?>
		<?php echo $form->textArea($model,'completed_work',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'completed_work'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_remaining'); ?>
		<?php echo $form->textArea($model,'work_remaining',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'work_remaining'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason_of_delay'); ?>
		<?php echo $form->textArea($model,'reason_of_delay',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reason_of_delay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pic'); ?>
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
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->