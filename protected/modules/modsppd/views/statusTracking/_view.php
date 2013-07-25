<?php
/* @var $this StatusTrackingController */
/* @var $data StatusTracking */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sppd_id')); ?>:</b>
	<?php echo CHtml::encode($data->sppd_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_date')); ?>:</b>
	<?php echo CHtml::encode($data->status_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes_by')); ?>:</b>
	<?php echo CHtml::encode($data->notes_by); ?>
	<br />


</div>