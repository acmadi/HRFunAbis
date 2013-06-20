<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'version'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'version_date'),
					'value'=>$model->version_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'version_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'status_date'),
					'value'=>$model->status_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'status_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'location'); ?>
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
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration'); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spmk_date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'spmk_date'),
					'value'=>$model->spmk_date,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
		<?php echo $form->error($model,'spmk_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->