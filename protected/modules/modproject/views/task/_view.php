<?php
/* @var $this TaskController */
/* @var $data Task */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_number')); ?>:</b>
	<?php echo CHtml::encode($data->project_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->plan_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->plan_end_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_progress')); ?>:</b>
	<?php echo CHtml::encode($data->plan_progress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('act_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->act_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('act_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->act_end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_progress')); ?>:</b>
	<?php echo CHtml::encode($data->actual_progress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>