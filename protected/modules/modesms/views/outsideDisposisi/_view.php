<?php
/* @var $this OutsideDisposisiController */
/* @var $data OutsideDisposisi */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outside_id')); ?>:</b>
	<?php echo CHtml::encode($data->outside_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disposisi_task')); ?>:</b>
	<?php echo CHtml::encode($data->disposisi_task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disposisi_from')); ?>:</b>
	<?php echo CHtml::encode($data->disposisi_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disposisi_verified')); ?>:</b>
	<?php echo CHtml::encode($data->disposisi_verified); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('disposisi_to')); ?>:</b>
	<?php echo CHtml::encode($data->disposisi_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>