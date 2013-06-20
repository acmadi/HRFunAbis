<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'education-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php //echo $form->labelEx($model,'employee_id'); ?>
		<?php //echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'employee_id'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textField($model,'university',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'formal_edu'); ?>
		<?php echo $form->textField($model,'formal_edu',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'formal_edu'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'major'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'town'); ?>
		<?php echo $form->textField($model,'town',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'status_university'); ?>
		<?php echo $form->radioButtonList($model,'status_university',array('negeri'=>'negeri','swasta'=>'swasta'),array(
                'template'=>'{input}{label}',
                'separator'=>'&nbsp;'
            )); 
		?>
		<?php echo $form->error($model,'status_university'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'is_foreign'); ?>
		<?php echo $form->radioButtonList($model,'is_foreign',array('negeri'=>'negeri','luar'=>'luar'),array(
                'template'=>'{input}{label}',
                'separator'=>'&nbsp;'
            )); 
		?>
		<?php echo $form->error($model,'is_foreign'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'year_start'); ?>
		<?php echo $form->textField($model,'year_start'); ?>
		<?php echo $form->error($model,'year_start'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'year_finish'); ?>
		<?php echo $form->textField($model,'year_finish'); ?>
		<?php echo $form->error($model,'year_finish'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'strata'); ?>
		<?php echo $form->dropDownList($model,'strata',$model->getStrataOptions()); ?>
		<?php echo $form->error($model,'strata'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'rating_type'); ?>
		<?php echo $form->textField($model,'rating_type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'rating_type'); ?>
	</div>

	<div class="action">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'submit',
			'name'=>'btnSubmit',
			'value'=>'Submit',
			'caption'=>$model->isNewRecord ? Yii::t('ui', 'Create') : Yii::t('ui','Save'),
		));  ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->