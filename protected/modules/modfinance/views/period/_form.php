<?php
/* @var $this PeriodController */
/* @var $model Period */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'period_tag'); ?>
		<?php echo $form->textField($model,'period_tag',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'period_tag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_start'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'period_start'),
						'value'=>$model->period_start,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
		<?php //echo $form->textField($model,'period_start'); ?>
		<?php echo $form->error($model,'period_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period_finish'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'period_finish'),
						'value'=>$model->period_finish,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
		<?php //echo $form->textField($model,'period_finish'); ?>
		<?php echo $form->error($model,'period_finish'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->