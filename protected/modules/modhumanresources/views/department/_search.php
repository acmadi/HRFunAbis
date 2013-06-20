<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'branch_office'); ?>
		<?php echo $form->textField($model,'branch_office',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="action">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->