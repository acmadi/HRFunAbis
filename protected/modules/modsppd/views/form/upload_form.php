<?php
/* @var $this FormController */
/* @var $model Form */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'statement_letter'); ?>
		<?php echo $form->fileField($model,'statement_letter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'statement_letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'support_letter'); ?>
		<?php echo $form->fileField($model,'support_letter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'support_letter'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('type'=>'null', 'label'=>'Cancel', 'url'=>Yii::app()->request->urlReferrer)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Upload')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->