<?php
/* @var $this TaskController */
/* @var $model Task */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'task-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_number'); ?>
		<?php echo $form->textField($model,'project_number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'project_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_start_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'plan_start_date'),
					'value'=>$model->plan_start_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'plan_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_end_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'plan_end_date'),
					'value'=>$model->plan_end_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'plan_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plan_progress'); ?>
		<?php echo $form->textField($model,'plan_progress',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'plan_progress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'act_start_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'act_start_date'),
					'value'=>$model->act_start_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'act_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'act_end_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'act_end_date'),
					'value'=>$model->act_end_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'act_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_progress'); ?>
		<?php echo $form->textField($model,'actual_progress',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'actual_progress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
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