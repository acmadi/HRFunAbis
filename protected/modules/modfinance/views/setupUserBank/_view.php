<?php
/* @var $this SetupUserBankController */
/* @var $data SetupUserBank */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomor_rek')); ?>:</b>
	<?php echo CHtml::encode($data->nomor_rek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active_since')); ?>:</b>
	<?php echo CHtml::encode($data->active_since); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>