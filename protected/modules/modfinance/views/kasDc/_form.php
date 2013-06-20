<?php
/* @var $this KasDcController */
/* @var $model KasDc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekening-dc-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="span6">
	<div class="row">
		<?php echo $form->labelEx($model,'code_kas'); ?>
		<?php echo $form->dropDownList($model,'code_kas',CHtml::listData(Kas::model()->findAll(), 'code_kas', 'nama_kas'), array('empty'=>'select kas', 'disabled' => true)); ?>
		<?php //echo $form->textField($model,'code_kas',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code_kas'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'debit'); ?>
		<?php echo $form->textField($model,'debit',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'debit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model,'currency',$model->getCurrencyOptions(), array('empty'=>'select currency', 'disabled' => true)); ?>
		<?php //echo $form->textField($model,'currency',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
				'name'=>CHtml::activeName($model,'date'),
				'value'=>$model->date,
				'options'=>array('dateFmt'=>'yyyy-MM-dd'),
			));
			?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>
	</div>
	<div class="span6">
	<div class="row">
		<?php echo $form->labelEx($model,'transaction'); ?>
		<?php echo $form->textArea($model,'transaction',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'transaction'); ?>
	</div>

	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->