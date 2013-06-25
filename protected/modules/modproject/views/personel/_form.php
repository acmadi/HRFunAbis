<?php
/* @var $this PersonelController */
/* @var $model Personel */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
  <div class="span12">
	<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'personel-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'project_number'); ?>
			<?php echo $form->textField($model,'project_number',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'project_number'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'employee_id'); ?>
			<?php echo $form->textField($model,'employee_id',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'employee_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'position'); ?>
			<?php echo $form->textField($model,'position',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'position'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'position_task'); ?>
			<?php echo $form->textArea($model,'position_task',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'position_task'); ?>
		</div>

		<div class="row">
				<?php echo CHtml::activeLabelEx($model,'start_join'); ?>
				<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'start_join'),
					'value'=>$model->start_join,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
				<?php echo $form->error($model,'start_join'); ?>
		</div>
		
		<div class="row">
				<?php echo CHtml::activeLabelEx($model,'end_join'); ?>
				<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
					'name'=>CHtml::activeName($model,'end_join'),
					'value'=>$model->end_join,
					'options'=>array('dateFmt'=>'yyyy-MM-dd'),
				));
				?>
				<?php echo $form->error($model,'end_join'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'telepon'); ?>
			<?php echo $form->textField($model,'telepon',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'telepon'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'remarks'); ?>
		</div>

		<div class="row buttons">
			<div class="form-actions">
			<?php /*echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); */?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'info', 'label'=>'Back', 'url'=>array('/modproject/personel/admin'))); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
			</div>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
  </div>	
</div>	