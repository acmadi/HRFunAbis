<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'position-exp-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_description'); ?>
		<?php echo $form->textField($model,'job_description',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'job_description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'period_start'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'period_start'),
			'value'=>$model->period_start,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
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
		<?php echo $form->error($model,'period_finish'); ?>
	</div>

	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->