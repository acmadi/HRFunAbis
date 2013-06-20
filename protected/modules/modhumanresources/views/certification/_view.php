<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certification_name')); ?>:</b>
	<?php echo CHtml::encode($data->certification_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_certification')); ?>:</b>
	<?php echo CHtml::encode($data->year_certification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_expired')); ?>:</b>
	<?php echo CHtml::encode($data->year_expired); ?>
	<br />


</div>