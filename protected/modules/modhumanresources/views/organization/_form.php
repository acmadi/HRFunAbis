<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organization-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="simple">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->dropDownList($model,'year',$model->getYears(), array('empty'=>'select year')); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->dropDownList($model,'pic',CHtml::listData(LevelPosition::model()->findAll(), 'position', 'position'), array('empty'=>'select position')); ?>
		<?php //echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="simple">
		<?php echo $form->labelEx($model,'lft'); ?>
		<?php echo $form->textField($model,'lft',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lft'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'rgt'); ?>
		<?php echo $form->textField($model,'rgt',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'rgt'); ?>
	</div>


	<div class="simple">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<?php /*
	<div class="simple">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->radioButtonList($model,'visible',array('1'=>'visible','0'=>'hide'),array(
                'template'=>'{label}{input}',
                'separator'=>'&nbsp;'
            )); 
		?>
		<?php echo $form->error($model,'visible'); ?>
	</div>
	*/?>
	
	<div class="simple">
		<?php //echo $form->labelEx($model,'task'); ?>
		<?php //echo $form->textField($model,'task',array('size'=>60,'maxlength'=>64)); ?>
		<?php //echo $form->error($model,'task'); ?>
	</div>
	
	<div class="simple">
		<?php echo $form->labelEx($model,'pic'); ?>
		<?php echo $form->dropDownList($model,'pic',CHtml::listData(Employee::model()->findAll(), 'employee_id', 'full_name'), array('empty'=>'select pic')); ?>
		<?php //echo $form->textField($model,'pic',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pic'); ?>
	</div>


	<div class="action">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'submit',
			'name'=>'btnSubmit',
			'value'=>'Submit',
			'caption'=>$model->isNewRecord ? Yii::t('ui', 'Create') : Yii::t('ui','Save'),
		));  ?>
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			'buttonType'=>'link',
			'name'=>'btnCancel',
			'value'=>'Cancel',
			'caption'=>Yii::t('ui', 'Cancel'),
			'url'=>array('/modhumanresources/organization/admin'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->