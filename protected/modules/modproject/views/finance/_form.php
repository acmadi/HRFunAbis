<?php
/* @var $this FinanceController */
/* @var $model Finance */
/* @var $form CActiveForm */
?>
<div class="row-fluid">
  <div class="span12">
	<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'finance-form',
		'enableAjaxValidation'=>false,
	)); ?>


		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'elbi'); ?>
			<?php echo $form->dropDownList($model,'elbi',CHtml::listData(Elbicode::model()->findAll(), 'elbi', 'elbi_desc'), array('empty'=>'pilih elbi')); ?>
			<?php echo $form->error($model,'elbi'); ?>
		</div>

		<div class="row">
				<?php echo $form->labelEx($model,'period_month'); ?>
				<?php echo $form->dropDownList($model,'period_month',$model->getPeriodOptions(), array('empty'=>'pilih periode bulan')); ?>
				<?php echo $form->error($model,'period_month'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'debit'); ?>
			<?php echo $form->textField($model,'debit',array('size'=>11,'maxlength'=>11)); ?>
			<?php echo $form->error($model,'debit'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'credit'); ?>
			<?php echo $form->textField($model,'credit',array('size'=>11,'maxlength'=>11)); ?>
			<?php echo $form->error($model,'credit'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textArea($model,'remarks',array('rows'=>5, 'cols'=>50, 'class'=>'span10')); ?>
			<?php echo $form->error($model,'remarks'); ?>
		</div>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
  </div>	
</div>	