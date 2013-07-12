<?php
/* @var $this LetterCostController */
/* @var $model LetterCost */
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
		<?php echo $form->label($model,'airport_tax_cost'); ?>
		<?php echo $form->textField($model,'airport_tax_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_tax_quantity'); ?>
		<?php echo $form->textField($model,'airport_tax_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laundry_cost'); ?>
		<?php echo $form->textField($model,'laundry_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laundry_quantity'); ?>
		<?php echo $form->textField($model,'laundry_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airline_cost'); ?>
		<?php echo $form->textField($model,'airline_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airline_quantity'); ?>
		<?php echo $form->textField($model,'airline_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_cost'); ?>
		<?php echo $form->textField($model,'hotel_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_quantity'); ?>
		<?php echo $form->textField($model,'hotel_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transportation_cost'); ?>
		<?php echo $form->textField($model,'transportation_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transportation_quantity'); ?>
		<?php echo $form->textField($model,'transportation_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_to_cost'); ?>
		<?php echo $form->textField($model,'from_to_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_to_quantity'); ?>
		<?php echo $form->textField($model,'from_to_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lumpsum_cost'); ?>
		<?php echo $form->textField($model,'lumpsum_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lumpsum_quantity'); ?>
		<?php echo $form->textField($model,'lumpsum_quantity'); ?>
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