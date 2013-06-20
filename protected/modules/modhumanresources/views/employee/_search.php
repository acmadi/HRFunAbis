<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="simple">
		<?php echo $form->label($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'full_name'); ?>
		<?php echo $form->textField($model,'full_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'pgassol_email'); ?>
		<?php echo $form->textField($model,'pgassol_email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'date_employee'); ?>
		<?php echo $form->textField($model,'date_employee'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'employee_status'); ?>
		<?php echo $form->textField($model,'employee_status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'effective_date'); ?>
		<?php echo $form->textField($model,'effective_date'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'previous_employee_id'); ?>
		<?php echo $form->textField($model,'previous_employee_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'place_of_birth'); ?>
		<?php echo $form->textField($model,'place_of_birth',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'birth_date'); ?>
		<?php echo $form->textField($model,'birth_date'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'blood_type'); ?>
		<?php echo $form->textField($model,'blood_type',array('size'=>5,'maxlength'=>5)); ?>
	</div>


	<div class="simple">
		<?php echo $form->label($model,'ktp'); ?>
		<?php echo $form->textField($model,'ktp',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'driver_licence'); ?>
		<?php echo $form->textField($model,'driver_licence',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'jamsostek'); ?>
		<?php echo $form->textField($model,'jamsostek',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'npwp'); ?>
		<?php echo $form->textField($model,'npwp',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'phone_mobile'); ?>
		<?php echo $form->textField($model,'phone_mobile',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'address_current_1'); ?>
		<?php echo $form->textField($model,'address_current_1',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'address_current_2'); ?>
		<?php echo $form->textField($model,'address_current_2',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'address_ktp'); ?>
		<?php echo $form->textField($model,'address_ktp',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'private_email'); ?>
		<?php echo $form->textField($model,'private_email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="action">
		<?php 
			$this->widget('zii.widgets.jui.CJuiButton', array(
				'buttonType'=>'submit',
				'name'=>'btnSubmit',
				'value'=>'1',
				'caption'=>'Search',
			));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->