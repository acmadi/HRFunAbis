<?php
/* @var $this KasController */
/* @var $model Kas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_kas'); ?>
		<?php echo $form->textField($model,'code_kas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_kas'); ?>
		<?php echo $form->textField($model,'nama_kas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'code_proyek'); ?>
		<?php echo $form->textField($model,'code_proyek',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proyek_desc'); ?>
		<?php echo $form->textField($model,'proyek_desc',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->