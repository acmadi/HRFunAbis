<?php
/* @var $this OutsideLetterController */
/* @var $data OutsideLetter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version')); ?>:</b>
	<?php echo CHtml::encode($data->version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version_date')); ?>:</b>
	<?php echo CHtml::encode($data->version_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
	<?php echo CHtml::encode($data->number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_division')); ?>:</b>
	<?php echo CHtml::encode($data->to_division); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_company')); ?>:</b>
	<?php echo CHtml::encode($data->from_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_contact')); ?>:</b>
	<?php echo CHtml::encode($data->from_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_position')); ?>:</b>
	<?php echo CHtml::encode($data->from_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_upload')); ?>:</b>
	<?php echo CHtml::encode($data->file_upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>