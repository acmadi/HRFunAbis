<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_type'); ?>
		<?php echo $form->textField($model,'request_type',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_date'); ?>
		<?php echo $form->textField($model,'request_date'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_by'); ?>
		<?php echo $form->textField($model,'request_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_phone_email'); ?>
		<?php echo $form->textField($model,'request_phone_email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_division'); ?>
		<?php echo $form->textField($model,'request_division',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_issue'); ?>
		<?php echo $form->textField($model,'request_issue',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_description'); ?>
		<?php echo $form->textArea($model,'request_description',array('simples'=>6, 'cols'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_solved_by'); ?>
		<?php echo $form->textField($model,'request_solved_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_answer'); ?>
		<?php echo $form->textArea($model,'request_answer',array('simples'=>6, 'cols'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_attachment'); ?>
		<?php echo $form->textField($model,'request_attachment',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'request_close_date'); ?>
		<?php echo $form->textField($model,'request_close_date'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="action">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->