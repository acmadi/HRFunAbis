<?php
/* @var $this RekeningDcController */
/* @var $model RekeningDc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekening-dc-form',
	'enableAjaxValidation'=>true,
)); ?>
	<div class="span6">
	<div class="row">
		<?php echo $form->labelEx($model,'nomor_rek'); ?>
		<?php echo $form->dropDownList($model,'nomor_rek',CHtml::listData(Rekening::model()->findAll(), 'nomor_rek', 'bank'), array('empty'=>'pilih rekening', 'disabled' => true)); ?>
		<?php //echo $form->textField($model,'nomor_rek',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nomor_rek'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'debit'); ?>
		<?php //echo $form->textField($model,'debit',array('size'=>10,'maxlength'=>10)); ?> 
		<?php //echo $form->error($model,'debit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit'); ?>
		<?php echo $form->textField($model,'credit',array('size'=>11,'maxlength'=>11)); ?><i>Isi nominal penarikan</i>
		<?php echo $form->error($model,'credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->dropDownList($model,'currency',$model->getCurrencyOptions(), array('empty'=>'select currency')); ?>
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
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->