<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	
	<?php echo $form->errorSummary($model); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Info')); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'employee_id'); ?>
			<?php echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'employee_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'full_name'); ?>
			<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'full_name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'pgassol_email'); ?>
			<?php echo $form->textField($model,'pgassol_email',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'pgassol_email'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'department'); ?>
			<?php echo $form->dropDownList($model,'department',CHtml::listData(Department::model()->findAll(), 'department', 'department'), array('empty'=>'select department')); ?>
			<?php echo $form->error($model,'department'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'position'); ?>
			<?php echo $form->dropDownList($model,'position',CHtml::listData(LevelPosition::model()->findAll(), 'position', 'position'), array('empty'=>'select assignment')); ?>
			<?php echo $form->error($model,'position'); ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabelEx($model,'date_employee'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
				'name'=>CHtml::activeName($model,'date_employee'),
				'value'=>$model->date_employee,
				'options'=>array('dateFmt'=>'yyyy-MM-dd'),
			));
			?>
			<?php echo $form->error($model,'date_employee'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'photo'); ?>
			<?php echo $form->fileField($model,'photo',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'photo'); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Personal Info')); ?>		
		<div class="row">
			<?php echo CHtml::activeLabelEx($model,'birth_date'); ?>
			<?php $this->widget('ext.my97DatePicker.JMy97DatePicker',array(
				'name'=>CHtml::activeName($model,'birth_date'),
				'value'=>$model->birth_date,
				'options'=>array('dateFmt'=>'yyyy-MM-dd'),
			));
			?>
			<?php echo $form->error($model,'birth_date'); ?>

		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'place_of_birth'); ?>
			<?php echo $form->textField($model,'place_of_birth',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'place_of_birth'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'gender'); ?>
			<?php echo $form->dropDownList($model,'gender',$model->getGenderOptions(), array('empty'=>'select gender')); ?>
			<?php echo $form->error($model,'gender'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'religion'); ?>
			<?php echo $form->dropDownList($model,'religion',$model->getReligionOptions(), array('empty'=>'select religion')); ?>
			<?php echo $form->error($model,'religion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'blood_type'); ?>
			<?php echo $form->dropDownList($model,'blood_type',$model->getBloodOptions(), array('empty'=>'select blood type')); ?>
			<?php echo $form->error($model,'blood_type'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'marital_status'); ?>
			<?php echo $form->dropDownList($model,'marital_status',$model->getMaritalOptions(), array('empty'=>'select status')); ?>
			<?php echo $form->error($model,'marital_status'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'number_of_dependent'); ?>
			<?php echo $form->textField($model,'number_of_dependent'); ?>
			<?php echo $form->error($model,'number_of_dependent'); ?>
		</div>
		
	<?php $this->endWidget(); ?>

	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kartu Identitas')); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'ktp'); ?>
			<?php echo $form->textField($model,'ktp',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ktp'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'passport'); ?>
			<?php echo $form->textField($model,'passport',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'passport'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'driver_licence'); ?>
			<?php echo $form->textField($model,'driver_licence',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'driver_licence'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'jamsostek'); ?>
			<?php echo $form->textField($model,'jamsostek',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'jamsostek'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'npwp'); ?>
			<?php echo $form->textField($model,'npwp',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'npwp'); ?>
		</div>
	<?php $this->endWidget(); ?>

	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Kontak')); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'phone_home'); ?>
			<?php echo $form->textField($model,'phone_home',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'phone_home'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'phone_mobile'); ?>
			<?php echo $form->textField($model,'phone_mobile',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'phone_mobile'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'private_email'); ?>
			<?php echo $form->textField($model,'private_email',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'private_email'); ?>
		</div>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'Alamat')); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'address_current_1'); ?>
			<?php echo $form->textField($model,'address_current_1',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'address_current_1'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'address_current_2'); ?>
			<?php echo $form->textField($model,'address_current_2',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'address_current_2'); ?>
		</div>

		<div class="row">	
			<?php echo $form->labelEx($model,'address_ktp'); ?>
			<?php echo $form->textField($model,'address_ktp',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'address_ktp'); ?>
		</div>
	<?php $this->endWidget(); ?>
		
	<?php
	$tabParameters = array();
	foreach($this->clips as $key=>$clip)
		$tabParameters['tab1'.(count($tabParameters)+1)] = array('title'=>$key, 'content'=>$clip);
	?>
	 
	<?php $this->widget('system.web.widgets.CTabView', array('tabs'=>$tabParameters)); ?>
	
	<div class = "action">
		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'info', 'label'=>'Back', 'url'=>array('/modhumanresources/employee/admin'))); ?>
			
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>	
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

