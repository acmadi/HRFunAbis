<?php
/* @var $this FormController */
/* @var $data Form */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_provider')); ?>:</b>
	<?php echo CHtml::encode($data->service_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class')); ?>:</b>
	<?php echo CHtml::encode($data->class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination')); ?>:</b>
	<?php echo CHtml::encode($data->destination); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('purpose')); ?>:</b>
	<?php echo CHtml::encode($data->purpose); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departure')); ?>:</b>
	<?php echo CHtml::encode($data->departure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('arrival')); ?>:</b>
	<?php echo CHtml::encode($data->arrival); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_type')); ?>:</b>
	<?php echo CHtml::encode($data->transport_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_vehicle')); ?>:</b>
	<?php echo CHtml::encode($data->transport_vehicle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sppd_type')); ?>:</b>
	<?php echo CHtml::encode($data->sppd_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('statement_letter')); ?>:</b>
	<?php echo CHtml::encode($data->statement_letter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_letter')); ?>:</b>
	<?php echo CHtml::encode($data->support_letter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	*/ ?>

</div>