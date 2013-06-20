<!--start testing-->
<?php if (Yii::app()->user->isGuest){ ?>
    <p>
	<?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'size' => 'large',
        'label' => 'login',
        'url' => '#login-modal',
        'htmlOptions' => array(
                        'data-toggle' => 'modal',
                        'onclick' => '$("#error-div").hide();$("#LoginForm_username").focus();'),
                         )
     );
	?>
	</p>
	<?php }?>
	<?php $this->beginWidget('bootstrap.widgets.TbModal', array(
                                            'id' => 'login-modal'
                                             )
          ); ?>
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3>login</h3>
    </div>
	
    <div class="modal-body">
    <?php
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'id' => 'LoginForm',
				'htmlOptions' => array(
					'class' => 'well'),
				)
			 );
	?>
	<div id="error-div" class="alert alert-block alert-error" style="display:none;"></div>    
	<?php echo $form->textFieldRow($model, 'username', array('class' => 'span3')); ?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span3')); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
															'buttonType' => 'ajaxSubmit', 
															'icon' => 'ok', 
															'label' => 'Submit', 
															'ajaxOptions' => array(
															'success' => 
															'function(data){
																	var obj = $.parseJSON(data);
																	if(obj.login=="success"){
																		$("#login-modal").modal("hide");
																		setTimeout(function(){location.reload(true);},400);
																	}else{
																		$("#error-div").show();
																		$("#error-div").html("");
																		if("LoginForm_password" in obj){
																			$("#error-div").html(obj.LoginForm_password[0]+"<br />");
																		}
																		if("LoginForm_username" in obj){
																			$("#error-div").append(obj.LoginForm_username[0]);
																		}
																	}
																}'),
											));
	?>
	 <?php $this->endWidget(); ?>
    </div>
<?php $this->endWidget(); ?>

<div class="item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</b>
	<?php echo CHtml::encode($data->full_name); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_employee')); ?>:</b>
	<?php echo CHtml::encode($data->date_employee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_status')); ?>:</b>
	<?php echo CHtml::encode($data->employee_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('effective_date')); ?>:</b>
	<?php echo CHtml::encode($data->effective_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->previous_employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('place_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->place_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blood_type')); ?>:</b>
	<?php echo CHtml::encode($data->blood_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rhesus')); ?>:</b>
	<?php echo CHtml::encode($data->rhesus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ktp')); ?>:</b>
	<?php echo CHtml::encode($data->ktp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport')); ?>:</b>
	<?php echo CHtml::encode($data->passport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('driver_licence')); ?>:</b>
	<?php echo CHtml::encode($data->driver_licence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jamsostek')); ?>:</b>
	<?php echo CHtml::encode($data->jamsostek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('npwp')); ?>:</b>
	<?php echo CHtml::encode($data->npwp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_home')); ?>:</b>
	<?php echo CHtml::encode($data->phone_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->phone_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_current_1')); ?>:</b>
	<?php echo CHtml::encode($data->address_current_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_current_2')); ?>:</b>
	<?php echo CHtml::encode($data->address_current_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_ktp')); ?>:</b>
	<?php echo CHtml::encode($data->address_ktp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('private_email')); ?>:</b>
	<?php echo CHtml::encode($data->private_email); ?>
	<br />

	*/ ?>

</div>