<?php
/* @var $this InsideLetterController */
/* @var $data InsideLetter */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('inisiator')); ?>:</b>
	<?php echo CHtml::encode($data->inisiator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ferivicator')); ?>:</b>
	<?php echo CHtml::encode($data->ferivicator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_division')); ?>:</b>
	<?php echo CHtml::encode($data->to_division); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_company')); ?>:</b>
	<?php echo CHtml::encode($data->to_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_contact')); ?>:</b>
	<?php echo CHtml::encode($data->to_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_position')); ?>:</b>
	<?php echo CHtml::encode($data->to_position); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to_address')); ?>:</b>
	<?php echo CHtml::encode($data->to_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>