<?php
/* @var $this OutsideDisposisiController */
/* @var $model OutsideDisposisi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'outside-disposisi-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'outside_id'); ?>
		<?php //echo $form->textField($model,'outside_id'); ?>
		<?php //echo $form->error($model,'outside_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'number'); ?>
		<?php //echo $form->textField($model,'number',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'subject'); ?>
		<?php //echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>200)); ?>
		<?php //echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disposisi_task'); ?>
		<?php echo $form->textField($model,'disposisi_task',array('size'=>60,'maxlength'=>200, 'class'=>'span10')); ?>
		<?php echo $form->error($model,'disposisi_task'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'disposisi_from'); ?>
		<?php //echo $form->textField($model,'disposisi_from',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'disposisi_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disposisi_verified'); ?>
		<?php echo $form->textField($model,'disposisi_verified',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'disposisi_verified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disposisi_to'); ?>
		<?PHP 
		
		echo $form->listBox($model,'disposisi_to',CHtml::listData($disposisi_to,'employee_id','name'),array('multiple'=>'multiple','size'=>10,));
		?>
		<?php //echo $form->textField($model,'disposisi_to',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'disposisi_to'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created_date'); ?>
		<?php //echo $form->textField($model,'created_date',array('size'=>4,'maxlength'=>4)); ?>
		<?php //echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'created_by'); ?>
		<?php //echo $form->textField($model,'created_by',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'created_by'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->