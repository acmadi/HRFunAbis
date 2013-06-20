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
		<?php echo $form->label($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'university'); ?>
		<?php echo $form->textField($model,'university',array('size'=>30,'maxlength'=>30)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'formal_edu'); ?>
		<?php echo $form->textField($model,'formal_edu',array('size'=>30,'maxlength'=>50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'town'); ?>
		<?php echo $form->textField($model,'town',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_university'); ?>
		<?php echo $form->textField($model,'status_university',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_foreign'); ?>
		<?php echo $form->textField($model,'is_foreign',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_start'); ?>
		<?php echo $form->textField($model,'year_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_finish'); ?>
		<?php echo $form->textField($model,'year_finish'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'strata'); ?>
		<?php echo $form->textField($model,'strata',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'rating_type'); ?>
		<?php echo $form->textField($model,'rating_type',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->