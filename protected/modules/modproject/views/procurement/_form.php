<?php
/* @var $this ProcurementController */
/* @var $model Procurement */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
  <div class="span12">
	<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'procurement-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<?php echo $form->errorSummary($model); ?>
		
		<div class="row">
			<?php echo $form->labelEx($model,'vendor'); ?>
			<?php echo $form->textField($model,'vendor',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'vendor'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'contract'); ?>
			<?php echo $form->textField($model,'contract',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'contract'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'contract_start_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'contract_start_date'),
						'value'=>$model->contract_start_date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
			<?php echo $form->error($model,'contract_start_date'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'contract_end_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'contract_end_date'),
						'value'=>$model->contract_end_date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
			<?php echo $form->error($model,'contract_end_date'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'period_month'); ?>
			<?php echo $form->textField($model,'period_month'); ?>
			<?php echo $form->error($model,'period_month'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'item'); ?>
			<?php echo $form->textField($model,'item',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'item'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'unit_price'); ?>
			<?php echo $form->textField($model,'unit_price',array('size'=>11,'maxlength'=>11)); ?>
			<?php echo $form->error($model,'unit_price'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'amount'); ?>
			<?php echo $form->textField($model,'amount',array('size'=>11,'maxlength'=>11)); ?>
			<?php echo $form->error($model,'amount'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'location'); ?>
			<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'location'); ?>
		</div>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
		

	<?php $this->endWidget(); ?>

	</div><!-- form -->
  </div>	
</div>	