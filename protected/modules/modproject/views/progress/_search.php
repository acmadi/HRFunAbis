<?php
/* @var $this ProgressController */
/* @var $model Progress */
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
		<?php echo $form->label($model,'project_number'); ?>
		<?php echo $form->textField($model,'project_number',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_date'); ?>
		<?php echo $form->textField($model,'period_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_week'); ?>
		<?php echo $form->textField($model,'period_week'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_month'); ?>
		<?php echo $form->textField($model,'period_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period_year'); ?>
		<?php echo $form->textField($model,'period_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress'); ?>
		<?php echo $form->textField($model,'progress'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termin_pgn'); ?>
		<?php echo $form->textArea($model,'termin_pgn',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termin_vendor'); ?>
		<?php echo $form->textArea($model,'termin_vendor',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress_actual'); ?>
		<?php echo $form->textField($model,'progress_actual',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress_plan'); ?>
		<?php echo $form->textField($model,'progress_plan',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress_this_week'); ?>
		<?php echo $form->textArea($model,'progress_this_week',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'completed_work'); ?>
		<?php echo $form->textArea($model,'completed_work',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_remaining'); ?>
		<?php echo $form->textArea($model,'work_remaining',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason_of_delay'); ?>
		<?php echo $form->textArea($model,'reason_of_delay',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic'); ?>
		<?php echo $form->textField($model,'pic',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->