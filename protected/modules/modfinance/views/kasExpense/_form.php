<?php
/* @var $this KasExpenseController */
/* @var $model KasExpense */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kas-expense-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="span12">
		<div class="span6">
			<div class="row">
				<?php echo $form->labelEx($model,'date'); ?>
				<?php //echo $form->textField($model,'date'); ?>
				<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
						'name'=>CHtml::activeName($model,'date'),
						'value'=>$model->date,
						'options'=>array('dateFmt'=>'yyyy-MM-dd'),
					));
					?>
				<?php echo $form->error($model,'date'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'code_kas'); ?>
				<?php echo $form->dropDownList($model,'code_kas',CHtml::listData(Kas::model()->findAll(), 'code_kas', 'nama_kas'), array('empty'=>'select kas', 'disabled' => true)); ?>
				<?php echo $form->error($model,'code_kas'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'elbi'); ?>
				<?php echo $form->dropDownList($model,'elbi',CHtml::listData(Elbicode::model()->findAll(), 'elbi', 'elbi'), array('empty'=>'select elbi')); ?>
				<?php //echo $form->textField($model,'elbi',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'elbi'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'transaction'); ?>
				<?php echo $form->textArea($model,'transaction',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'transaction'); ?>
			</div>
			
			<div class="form-actions">
				<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
			</div>
		
		</div>
		<div class="span6">
			<div class="row">
				<?php echo $form->labelEx($model,'currency'); ?>
				<?php echo $form->dropDownList($model,'currency',$model->getCurrencyOptions(), array('empty'=>'select currency', 'disabled'=>true)); ?>
				<?php //echo $form->textField($model,'currency',array('size'=>5,'maxlength'=>5)); ?>
				<?php echo $form->error($model,'currency'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'amount'); ?>
				<?php echo $form->textField($model,'amount',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'amount'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'ppn'); ?>
				<?php echo $form->textField($model,'ppn',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'ppn'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'pph21'); ?>
				<?php echo $form->textField($model,'pph21',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'pph21'); ?>
			</div>
			
			<div class="row">
				<?php echo $form->labelEx($model,'pph23'); ?>
				<?php echo $form->textField($model,'pph23',array('size'=>11,'maxlength'=>11)); ?>
				<?php echo $form->error($model,'pph23'); ?>
			</div>

			<div class="row">
				<?php //echo $form->labelEx($model,'created_date'); ?>
				<?php //echo $form->textField($model,'created_date'); ?>
				<?php //echo $form->error($model,'created_date'); ?>
			</div>

			<div class="row">
				<?php //echo $form->labelEx($model,'created_by'); ?>
				<?php //echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
				<?php //echo $form->error($model,'created_by'); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->