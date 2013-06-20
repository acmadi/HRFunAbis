<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certification-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>true,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'certification_name'); ?>
		<?php echo $form->textField($model,'certification_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'certification_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_certification'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'year_certification'),
			'value'=>$model->year_certification,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php echo $form->error($model,'year_certification'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'attached'); ?>
		<?php echo $form->fileField($model,'attached'); ?>
		<?php echo $form->error($model,'attached'); ?>
	</div>

	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->