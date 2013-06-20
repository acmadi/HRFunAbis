<?php
/* @var $this ProgressController */
/* @var $data Progress */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_number')); ?>:</b>
	<?php echo CHtml::encode($data->project_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_date')); ?>:</b>
	<?php echo CHtml::encode($data->period_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_week')); ?>:</b>
	<?php echo CHtml::encode($data->period_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_month')); ?>:</b>
	<?php echo CHtml::encode($data->period_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('period_year')); ?>:</b>
	<?php echo CHtml::encode($data->period_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress')); ?>:</b>
	<?php echo CHtml::encode($data->progress); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termin_pgn')); ?>:</b>
	<?php echo CHtml::encode($data->termin_pgn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termin_vendor')); ?>:</b>
	<?php echo CHtml::encode($data->termin_vendor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_actual')); ?>:</b>
	<?php echo CHtml::encode($data->progress_actual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_plan')); ?>:</b>
	<?php echo CHtml::encode($data->progress_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_this_week')); ?>:</b>
	<?php echo CHtml::encode($data->progress_this_week); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completed_work')); ?>:</b>
	<?php echo CHtml::encode($data->completed_work); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_remaining')); ?>:</b>
	<?php echo CHtml::encode($data->work_remaining); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason_of_delay')); ?>:</b>
	<?php echo CHtml::encode($data->reason_of_delay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b>
	<?php echo CHtml::encode($data->pic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>