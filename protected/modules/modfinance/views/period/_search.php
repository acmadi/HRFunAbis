<?php
/* @var $this PeriodController */
/* @var $model Period */
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
		<?php echo $form->label($model,'period_tag'); ?>
		<?php echo $form->textField($model,'period_tag',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_start'); ?>
		<?php echo $form->textField($model,'period_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_finish'); ?>
		<?php echo $form->textField($model,'period_finish'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->