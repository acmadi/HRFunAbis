<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('university')); ?>:</b>
	<?php echo CHtml::encode($data->university); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('town')); ?>:</b>
	<?php echo CHtml::encode($data->town); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_university')); ?>:</b>
	<?php echo CHtml::encode($data->status_university); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_foreign')); ?>:</b>
	<?php echo CHtml::encode($data->is_foreign); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_start')); ?>:</b>
	<?php echo CHtml::encode($data->year_start); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('year_finish')); ?>:</b>
	<?php echo CHtml::encode($data->year_finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('strata')); ?>:</b>
	<?php echo CHtml::encode($data->strata); ?>
	<br />

	*/ ?>

</div>