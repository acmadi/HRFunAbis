<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'education-form',
	'enableAjaxValidation'=>true,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textField($model,'university',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'formal_edu'); ?>
		<?php echo $form->textField($model,'formal_edu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'formal_edu'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'major'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'town'); ?>
		<?php echo $form->textField($model,'town',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_start'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'year_start'),
			'value'=>$model->year_start,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php echo $form->error($model,'year_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_finish'); ?>
		<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
			'name'=>CHtml::activeName($model,'year_finish'),
			'value'=>$model->year_finish,
			'options'=>array('dateFmt'=>'yyyy-MM-dd'),
		));
		?>
		<?php echo $form->error($model,'year_finish'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'strata'); ?>
		<?php echo $form->dropDownList($model,'strata',$model->getStrataOptions()); ?>
		<?php echo $form->error($model,'strata'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'rating_type'); ?>
		<?php echo $form->textField($model,'rating_type',array('size'=>50,'maxlength'=>50)); ?> <i>*) ex : 3.3 </i>
		<?php echo $form->error($model,'rating_type'); ?>
	</div>

	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->