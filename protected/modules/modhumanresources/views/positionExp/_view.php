<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_start')); ?>:</b>
	<?php echo CHtml::encode($data->period_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_finish')); ?>:</b>
	<?php echo CHtml::encode($data->period_finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position')); ?>:</b>
	<?php echo CHtml::encode($data->position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_description')); ?>:</b>
	<?php echo CHtml::encode($data->job_description); ?>
	<br />


</div>